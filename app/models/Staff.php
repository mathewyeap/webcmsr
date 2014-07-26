<?php

class Staff extends BaseModel {
	protected $table = 'staff';
	public $timestamps = false;
	
	protected $fillable = ['work_phone', 'office', 'can_create_course'];
	protected $guarded = ['id'];
}
