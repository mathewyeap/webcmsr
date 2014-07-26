<?php

class Message extends BaseModel {
	protected $fillable = ['title', 'mesg', 'creator_id'];
	
	// Ardent
	public static $rules = [
		'mesg' => 'sometimes|required',
		'course_id' => 'required',
		'creator_id' => 'required',
	];

	public static $relationsData = [
		'creator' => [ self::BELONGS_TO, 'User', 'foreignKey' => 'creator_id' ],
		'attachment' => [ self::BELONGS_TO, 'Upload', 'foreignKey' => 'attachment_id']
	];

	public function erase()
	{
		if ( ! is_null($this->attachment)) $this->attachment->erase();
		return self::delete();
	}

	public function beforeValidate()
	{
		if ( ! isset($this->id)) $this->id = self::max('id') + 1;

		if ( ! isset($this->creator_id)) $this->creator_id = Auth::user()->id;

		if (Input::hasFile('attachments'))
		{
			$file = Input::file('attachments');
			if ( ! $file->isValid())
				App::abort(400, 'One of the attachments is not valid.');

			$upload = new Upload;
			$upload->setFile($file);
			$upload->course_id = $this->course_id;
			$upload->save();

			$oldAttachment = $this->attachment;
			if ( ! is_null($oldAttachment)) $oldAttachment->erase();

			$this->attachment_id = $upload->id;
		}
	}
}
