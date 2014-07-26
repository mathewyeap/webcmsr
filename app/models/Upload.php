<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Upload extends BaseModel {
	protected $guarded = ['id'];
	protected $fillable = [];
	protected $file;

	// Ardent
	public static $relationsData = [
		'creator' => [ self::BELONGS_TO, 'User' ],
	];

	public function beforeValidate()
	{
		if ( ! Auth::check()) return false;

		$file = $this->file;
		$this->mime_type = $file->getMimeType();
		$this->size = $file->getSize();
		$this->display_name = $file->getClientOriginalName();

		$this->creator_id = Auth::user()->id;
	}

	public function afterSave()
	{
		try
		{
			File::makeDirectory($this->dirPath(), 0770, true, true);
			$this->file->move($this->dirPath(), $this->id);
		} catch (Exception $e)
		{
			$this->delete();
			throw $e;
		}
	}

	public function dirPath()
	{
		$digits = 3;
		$trail = substr($this->id, -$digits);
		$folder = str_pad($trail, $digits, '0', STR_PAD_LEFT);

		return data_path($folder);
	}

	public function path()
	{
		return $this->dirPath().'/'.$this->id;
	}

	public function erase()
	{
		DB::transaction(function() {
			parent::delete();
			File::delete($this->path());
		});
	}

	public function setFile(UploadedFile $file)
	{
		$this->file = $file;
	}
}
