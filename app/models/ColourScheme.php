<?php

class ColourScheme extends BaseModel {
	public $primaryKey = 'name';
	public $timestamps = false;
	public $fillable = ['name', 'bg', 'text', 'bg_hilight', 'text_hilight', 'unread'];

	// Ardent
	public static $relationsData = [
		'courses' => [ self::HAS_MANY, 'Course' ],
	];

	public static function colourSchemes()
	{
		return self::orderBy('bg', 'desc');
	}

	public static function defaultColourScheme()
	{
		if ( ! is_null($colourScheme = self::find('sky'))) return $colourScheme;

		return self::first();
	}
}
