<?php

class PasswordReminder extends BaseModel {
	public $timestamps = false;

	public static function canSendReminderEmail($email)
	{
		$lastEmailDate = self::where('email', $email)
			->orderBy('created_at', 'desc')
			->pluck('created_at');
			
		return is_null($lastEmailDate);
	}
}