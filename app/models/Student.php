<?php

class Student extends BaseModel {
	public $timestamps = false;
	
	protected $guarded = ['id'];

	// Ardent
	public static $relationsData = [
		'user' => [ self::BELONGS_TO, 'User' ],
	];
}
