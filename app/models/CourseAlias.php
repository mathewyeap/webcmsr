<?php

class CourseAlias extends \BaseModel {
	protected $fillable = ['alias', 'course_id'];

	// Ardent
	public static $relationsData = [
		'course' => [ self::BELONGS_TO, 'Course' ],
	];
}
