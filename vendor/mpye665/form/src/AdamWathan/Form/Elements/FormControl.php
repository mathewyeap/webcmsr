<?php namespace AdamWathan\Form\Elements;

abstract class FormControl extends Element
{
    public function __construct($name)
    {
        $this->setName($name);
    }

    protected function setName($name)
    {
        $this->setAttribute('name', $name);
    }

    public function required($required = true)
    {
        if ($required !== false)
            $this->setAttribute('required', 'required');

        return $this;
    }

    public function optional()
    {
        $this->removeAttribute('required');
        return $this;
    }

    public function disable($disabled = true)
    {
        if ($disabled !== false)
            $this->setAttribute('disabled', 'disabled');
        
        return $this;
    }

    public function enable()
    {
        $this->removeAttribute('disabled');
        return $this;
    }
}
