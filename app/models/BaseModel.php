<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Support\Collection;

class BaseModel extends Ardent {
	public $autoHydrateEntityFromInput = false;

	public static function table()
	{
		$instance = new static;
		return $instance->getTable();
	}

	// Useful for performing a fluent query using the table named stored in the eloquent model.
	public static function fluent($alias = null)
	{
		$tableName = self::table();
		if ( ! empty($alias)) $tableName .= ' as '.$alias;

		return DB::table($tableName);
	}

	// Common database functions to format the time. 
	public static function today()
	{
		return date('Y-m-d');
	}

	public static function now()
	{
		return date('Y-m-d H:i:s');
	}

	public static function create(array $attributes = [])
	{
		throw new Exception('Don\'t use this function. Instead use $model = new {model} and $model->save.');
	}
}
