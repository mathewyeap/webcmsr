<?php

use McCool\LaravelAutoPresenter\BasePresenter;

class UploadPresenter extends BasePresenter {

	public function url($courseId) {
		return HTML::linkAction('course.{course}.upload.show', $this->display_name, [$courseId, $this->id]);
	}
}
