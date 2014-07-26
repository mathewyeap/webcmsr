<?php namespace WebCMS\Extensions\Http;

class Request extends \Illuminate\Http\Request {

	public function all($setEmptyStringsToNull = true)
	{
		$input = parent::all();
		foreach ($input as $key => $value)
		{
			if ($input[$key] === '') $input[$key] = null;
		}
		return $input;
	}

}