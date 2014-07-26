<?php

class Tool extends \BaseModel {
	protected $guarded = ['id'];
	public $timestamps = false;

	public static function mainTools()
	{
		return self::whereNull('parent_id')->orderBy('tool_order')->get();
	}

	public static function tools()
	{
		return self::orderBy('tool_order');
	}

	public static function courseDefaultTools()
	{
		return self::tools()->where('course_default', true);
	}
}
