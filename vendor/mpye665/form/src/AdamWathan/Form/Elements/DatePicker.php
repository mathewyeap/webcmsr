<?php namespace AdamWathan\Form\Elements;

class DatePicker extends Text {

	public function render()
	{
		$result  = '<div class="input-group date" data-date-format="YYYY-MM-DD">';
		$result .= '<input';

		$result .= $this->renderAttributes();

		$result .= '>';
		$result .= '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';
		$result .= '</div>';

		return $result;
	}

}