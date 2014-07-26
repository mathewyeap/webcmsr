<?php namespace AdamWathan\BootForms;

use AdamWathan\Form\FormBuilder;
use AdamWathan\BootForms\Elements\FormGroup;
use AdamWathan\BootForms\Elements\CheckGroup;
use AdamWathan\BootForms\Elements\HelpBlock;
use AdamWathan\BootForms\Elements\GroupWrapper;
use AdamWathan\BootForms\Elements\RadioList;

class BasicFormBuilder
{
	protected $builder;

	public function __construct(FormBuilder $builder)
	{
		$this->builder = $builder;
	}

	protected function formGroup($label, $name, $control)
	{
		$label = $this->builder->label($label, $name)->addClass('control-label')->forId($name);
		$control->id($name)->addClass('form-control');

		$formGroup = new FormGroup($label, $control);

		if ($this->builder->hasError($name)) {
			$formGroup->helpBlock(new HelpBlock($this->builder->getError($name)));
			$formGroup->addClass('has-error');
		}

		return $this->wrap($formGroup);
	}

	protected function wrap($group)
	{
		return new GroupWrapper($group);
	}

	public function text($label, $name, $value = null)
	{
		$control = $this->builder->text($name)->value($value);

		return $this->formGroup($label, $name, $control);
	}

	public function password($label, $name)
	{
		$control = $this->builder->password($name);

		return $this->formGroup($label, $name, $control);
	}

	public function submit($value = "Submit", $type = "btn-default")
	{
		return $this->builder->submit($value)->addClass('btn')->addClass($type);
	}

	public function select($label, $name, $options = array())
	{
		$control = $this->builder->select($name, $options);

		return $this->formGroup($label, $name, $control);
	}

	public function checkbox($label, $name)
	{
		$control = $this->builder->checkbox($name);

		return $this->checkGroup($label, $name, $control);
	}

	protected function checkGroup($label, $name, $control)
	{
		$checkGroup = $this->buildCheckGroup($label, $name, $control);
		return $this->wrap($checkGroup->addClass('checkbox'));
	}

	protected function buildCheckGroup($label, $name, $control)
	{
		$checkGroup = $this->buildCheckGroupWithoutError($label, $name, $control);
		if ($this->builder->hasError($name)) {
			$checkGroup->helpBlock(new HelpBlock($this->builder->getError($name)));
			$checkGroup->addClass('has-error');
		}
		return $checkGroup;
	}

	protected function buildCheckGroupWithoutError($label, $name, $control)
	{
		$label = $this->builder->label($label, $name)->after($control)->addClass('control-label');
		$checkGroup = new CheckGroup($label);
		return $checkGroup;
	}

	public function radio($label, $name, $value = null)
	{
		if (is_null($value)) {
			$value = $label;
		}
		if (is_array($value)) {
			return $this->createRadioListGroup($label, $name, $value);
		}

		$control = $this->builder->radio($name, $value);

		return $this->radioGroup($label, $name, $control);
	}

	protected function createRadioListGroup($title, $name, $options)
	{
		$label = $this->builder->label($title, $name)->addClass('control-label');
		$control = $this->buildRadioList($name, $options);
		$formGroup = new FormGroup($label, $control);
		if ($this->builder->hasError($name)) {
			$formGroup->helpBlock(new HelpBlock($this->builder->getError($name)));
			$formGroup->addClass('has-error');
		}
		return $this->wrap($formGroup);
	}

	protected function buildRadioList($name, $options)
	{
		$radios = [];
		if (! is_assoc($options)) {
			$options = array_combine(array_values($options), array_values($options));
		}
		foreach ($options as $value => $label) {
			$control = $this->builder->radio($name, $value);
			$group = $this->radioGroupWithoutError($label, $name, $control);
			$radios[] = $group;
		}
		return new RadioList($radios);
	}

	protected function radioGroup($label, $name, $control)
	{
		$checkGroup = $this->buildCheckGroup($label, $name, $control);
		return $this->wrap($checkGroup->addClass('radio'));
	}

	protected function radioGroupWithoutError($label, $name, $control)
	{
		$checkGroup = $this->buildCheckGroupWithoutError($label, $name, $control);
		return $this->wrap($checkGroup->addClass('radio'));
	}

	public function textarea($label, $name)
	{
		$control = $this->builder->textarea($name);

		return $this->formGroup($label, $name, $control);
	}

	public function inlineCheckbox($label, $name)
	{
		$label = $this->builder->label($label)->addClass('checkbox-inline');
		$control = $this->builder->checkbox($name);

		return $label->after($control);
	}

	public function inlineRadio($label, $name, $value = null)
	{
		$value = $value ?: $label;
		$label = $this->builder->label($label)->addClass('radio-inline');
		$control = $this->builder->radio($name, $value);

		return $label->after($control);
	}

	public function date($label, $name, $value = null)
	{
		$control = $this->builder->date($name)->value($value);

		return $this->formGroup($label, $name, $control);
	}

	public function email($label, $name, $value = null)
	{
		$control = $this->builder->email($name)->value($value);

		return $this->formGroup($label, $name, $control);
	}

	public function file($label, $name, $value = null)
	{
		$control = $this->builder->file($name)->value($value);
		$label = $this->builder->label($label, $name)->addClass('control-label')->forId($name);
		$control->id($name);

		$formGroup = new FormGroup($label, $control);

		if ($this->builder->hasError($name)) {
			$formGroup->helpBlock(new HelpBlock($this->builder->getError($name)));
			$formGroup->addClass('has-error');
		}

		return $this->wrap($formGroup);
	}

	public function __call($method, $parameters)
	{
		return call_user_func_array(array($this->builder, $method), $parameters);
	}




	protected function textWithPlaceholder($label, $name, $value = null, $placeholder = null)
	{
		$control = $this->builder->text($name)->value($value);
		if (isset($placeholder)) $control->placeholder($placeholder);

		return $this->formGroup($label, $name, $control);	
	}

	public function homePhone($label, $name, $value = null)
	{
		return $this->textWithPlaceholder($label, $name, $value, 'E.g. (02)98553958');
	}

	public function mobile($label, $name, $value = null)
	{
		return $this->textWithPlaceholder($label, $name, $value, 'E.g. 0454309486');
	}

	public function gender($label, $name)
	{

	}

	public function datePicker($label, $name, $value = null)
	{
		$control = $this->builder->datePicker($name)->value($value);	
		return $this->formGroup($label, $name, $control);
	}

}