<?php

use McCool\LaravelAutoPresenter\BasePresenter;

class TeachingTermPresenter extends BasePresenter {

	public function __construct(TeachingTerm $term) {
		$this->resource = $term;
	}

	public function termSelect($name, $selected = 0, $options = [])
	{
		$terms = ['[Current]' => 'Current session', '[Any]' => 'Any session'] + 
			\TeachingTerm::terms()->lists('full_name', 'id');

		return $this->select($name, $terms, $selected, $options);
	}

}
