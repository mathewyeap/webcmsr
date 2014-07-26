<?php

class Course extends BaseModel {
	protected $fillable = ['code', 'title', 'semester_id', 'colour_scheme_id', 'intro_link', 'home_id', 'uoc'];

	// Ardent
	public static $rules = [
		'code' => 'sometimes|required|regex:#[A-Z]{4}\d{4}#',
		'title' => 'sometimes|required',
		'semester_id' => 'sometimes|required',
		'uoc' => 'numeric|max:24',
		'colour_scheme_id' => 'exists:colour_schemes,name'
	];

	public static $relationsData = [
		'colourScheme' => [ self::BELONGS_TO, 'ColourScheme', 'foreignKey' => 'colour_scheme_id' ],
		'semester' => [ self::BELONGS_TO, 'Semester', 'foreignKey' => 'semester_id'],
		'aliases' =>  [ self::HAS_MANY, 'CourseAlias' ],
		'links' => [ self::HAS_MANY, 'Link' ],
		'notices' => [ self::HAS_MANY, 'Notice', 'foreignKey' => 'course' ],
		'students' => [ self::BELONGS_TO_MANY, 'Student', 'table' => 'enrolments', 'otherKey' => 'user_id' ],
	];

	public function getColourScheme()
	{
		return $this->colourScheme ?: ColourScheme::defaultColourScheme();
	}

	public function parentLinks()
	{
		return $this->hasMany('Link')
			->whereNull('parent_id')
			->orderBy('link_order');
	}

	public function beforeCreate()
	{
		if ($this->checkIfAlreadyExists())
		{
			$this->errors()
				->add('code', 'A course with this code already exists in this semester.');

			return false;
		}
	}

	public function afterCreate()
	{
		$courseDefaultTools = Tool::courseDefaultTools()->get();
		$parentTools = [];
		$subTools = [];
		foreach ($courseDefaultTools as $tool)
		{
			if (is_null($tool->parent_id))
				$parentTools[] = $tool;
			else
				$subTools[] = $tool;
		}

		foreach ($parentTools as $parentTool)
		{
			$link = new Link;
			$link->fill([
				'course_id' => $this->id,
				'name' => $parentTool->name,
			 	'tool_id' => $parentTool->id ]);

			$link->save();

			foreach ($subTools as $subTool)
			{
				if ($subTool->parent_id == $parentTool->id)
				{
					$subLink = new Link;
					$subLink->fill([
						'course_id' => $this->id,
						'name' => $subTool->name,
						'tool_id' => $subTool->id,
					 	'parent_id' => $link->id ]);

					$subLink->save();
				}
			}
		}
	}

	public function checkIfAlreadyExists()
	{
		$existingCourse = self::where('code', $this->code)
			->where('semester_id', $this->semester_id)->first();
		
		return ! is_null($existingCourse);
	}

	public function erase()
	{
		DB::transaction(function()
		{
			// Delete all data related to this course.
			foreach ($this->links as $link) $link->erase();			

			parent::delete();
		});
	}

	public static function queryCourses($semester, $ownerPatt, $coursePatt)
	{
		if ( ! isset($semester) || $semester === '[Any]') $semester = null;
        if ( ! isset($ownerPatt) || $ownerPatt === '[Anyone]') $ownerPatt = null;
        if ( ! isset($coursePatt) || $coursePatt === '[Anything]') $coursePatt = null;

        if ($semester === '[Current]')
        {
        	$currentSemester = Semester::currentSemester();
			$semester = ! is_null($currentSemester) ? $currentSemester->id : 0;
        }

        // At this point arguments are set and defined properly.

        $query = DB::table(Course::table().' as c')
        	->select('c.id', 'c.code', 'c.title', 't.show_name as term', 'u.display_name as lic')
        	->leftJoin('course_staff as cs', function($join) {
        		$join->on('c.id', '=', 'cs.course_id')
        			->where('cs.role', '=', 'LI');
        	})
        	->leftJoin(User::table().' as u', 'cs.staff_id', '=', 'u.id')
        	->join(Semester::table().' as t', 'c.semester_id', '=', 't.id');

		if ( ! is_null($ownerPatt)) $query->where('u.display_name', 'ilike', "%$ownerPatt%");
        if ( ! is_null($semester)) $query->where('c.semester_id', $semester);

		if ( ! is_null($coursePatt))
		{
			$query->where(
				function($q) use($coursePatt)
				{
					$q->where('c.code', 'ilike', "%$coursePatt%")
						->orWhere('c.title', 'ilike', "%$coursePatt%");
				}
			);
        }

		return $query->orderBy('t.end_date', 'desc')->orderBy('c.code', 'asc');
	}
}
