<?php

class Permission {

	const ROLE_PUBLIC = 'PU';
	const ROLE_STUDENT = 'NE';
	const ROLE_ENROLLED_STUDENT = 'EN';
	const ROLE_TUTOR = 'TT';
	const ROLE_COURSE_ADMIN = 'CA';
	const ROLE_LECTURER = 'LI';
	const ROLE_SYSTEM_ADMIN = 'SA';

	public static $roles = [
		self::ROLE_PUBLIC => 'Public',
		self::ROLE_STUDENT => 'Student',
		self::ROLE_ENROLLED_STUDENT => 'Enrolled Student',
		self::ROLE_TUTOR => 'Course Tutor',
		self::ROLE_COURSE_ADMIN => 'Course Admin',
		self::ROLE_LECTURER => 'Lecturer',
		self::ROLE_SYSTEM_ADMIN => 'Administrator',
	];

	public static function accessLevel($role)
	{
		$accessLevel = array_search($role, array_keys(self::$roles));
		return empty($accessLevel) ? 0 : $accessLevel;
	}

	public static function role()
	{
		return self::$roles[self::roleKey()];
	}

	protected static function roleKey($courseId = null)
	{
		$user = Auth::user();
		if (isset($user->roleKey))
			return $user->roleKey;

		if (is_null($user)) return self::ROLE_PUBLIC;
		if (self::isAdmin()) return $user->roleKey = self::ROLE_SYSTEM_ADMIN;

		if (is_null($courseId))
		{
			$staff = $user->staff;			
			if ( ! is_null($staff))
				return $user->roleKey = self::ROLE_LECTURER;

			$student = $user->student;
			if ( ! is_null($student))
				return $user->roleKey = self::ROLE_STUDENT;

			return $user->roleKey = self::ROLE_PUBLIC;
		}

		$roleKey = DB::table('course_staff')
			->where('course_id', $courseId)
			->where('staff_id', $user->id)
			->pluck('role');

		if ( ! is_null($roleKey))
			return $user->roleKey = $roleKey;

		$roleKey = DB::table('enrolments')
			->where('course_id', $courseId)
			->where('user_id', $user->id)
			->pluck('status');

		if ( ! is_null($roleKey))
			return $user->roleKey = $roleKey;

		return $user->roleKey = self::ROLE_PUBLIC;
	}

	public static function hasMinRole($minRoleKey, $courseId = null)
	{
		if (is_null($minRoleKey) || $minRoleKey === self::ROLE_PUBLIC) return true;

		$minAccessLevel = self::accessLevel($minRoleKey);
		$userAccessLevel = self::accessLevel(self::roleKey());

		return $userAccessLevel >= $minAccessLevel;
	}

	public static function isAdmin()
	{
		return Auth::user()->id === 1;
	}

	public static function canCreateCourse()
	{
		if (self::isAdmin())
			return true;

		$staff = Auth::user()->staff;

		if (is_null($staff) || ! $staff->can_create_course)
			return false;

		return true;
	}

	public static function getAuthSelectData()
	{
		return self::$roles;
	}
}