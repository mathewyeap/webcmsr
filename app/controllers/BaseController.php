<?php

class BaseController extends Controller {

	public function __construct()
	{		
		$this->beforeFilter(function()
		{
		    Event::fire('clockwork.controller.start');
		});

		Request::setTrustedProxies([$_SERVER['REMOTE_ADDR']]);

		$this->beforeFilter('course.link.parameter');

		$this->afterFilter(function()
		{
		    Event::fire('clockwork.controller.end');
		});
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
			$this->layout = View::make($this->layout);
	}
}
