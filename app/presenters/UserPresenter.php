<?php

use McCool\LaravelAutoPresenter\BasePresenter;

class UserPresenter extends BasePresenter {

	public function __construct(User $resource)
	{
		$this->resource = $resource;
	}

	public function birthdayStr()
	{
		if ( ! isset($this->resource->birthday)) return '';

		return date('j M Y', strtotime($this->resource->birthday));
	}

	public function sortName()
	{
		$sortName = $this->resource->family_name;
		if (isset($this->resource->given_name)) $sortName .= ', '.$this->resource->given_name;

		return $sortName;
	}
}
