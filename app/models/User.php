<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {
	public $timestamps = false;
	protected $fillable = [
		'username', 'password', 'family_name', 'given_name',
		'title', 'display_name', 'home_phone',
		'mobile', 'email', 'home_page', 'gender', 'birthday'];
	protected $hidden = ['password'];

	public $presenter = '\UserPresenter';

	// Ardent
	public static $rules = [
		'username' => 'required',
		'family_name' => '',
		'title' => '',
		'display_name' => '',
		'home_phone' => 'regex:#^\(\d{2}\)\d{8}$#',
		'mobile' => 'regex:#^04\d{8}$#',
		'email' => 'email',
		'birthday' => 'date_format:Y-m-d',
		'home_page' => 'url',
		'gender' => 'in:M,F,m,f',
	];

	public static $relationsData = [
		'staff' => [self::HAS_ONE, 'Staff', 'foreignKey' => 'id'],
		'student' => [self::HAS_ONE, 'Student', 'foreignKey' => 'id']
	];

	public function enrolledCourses()
	{
		return $this->belongsToMany('Course', 'enrolments', 'user_id');
	}

	public function pastCourses()
	{
		return $this->belongsToMany('Course', 'enrolments', 'user_id');
	}


	public function queryUsers($role)
	{
		if ( ! isset($role) || $role === '[Any]') $role = null;

        $query = User::fluent('u')
        	
        	->select('c.id', 'c.code', 'c.title', 't.show_name as term', 'u.display_name as lic')
        	->leftJoin('course_staff as cs', function($join) {
        		$join->on('c.id', '=', 'cs.course_id')
        			->where('cs.role', '=', 'LI');
        	})
        	->leftJoin(User::TABLE.' as u', 'cs.staff_id', '=', 'u.id')
        	->join(Semester::TABLE.' as t', 'c.semester_id', '=', 't.id');

		if ( ! is_null($ownerPatt))
		{
			$query->where('u.display_name', 'ilike', "%$ownerPatt%");
		}

        if ( ! is_null($semester))
        {
        	$query->where('c.semester_id', $semester);
        }

		return $query->orderBy('t.end_date', 'desc')->orderBy('c.code', 'asc');
	}


	public function beforeValidate()
	{
		if ( ! isset($this->id)) $this->id = User::max('id') + 1;
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}
