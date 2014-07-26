<?php namespace WebCMS\Extensions\Html;
 
class FormBuilder extends \Illuminate\Html\FormBuilder {
    
	public function deleteForm($url, $formParams = [])
	{
		$formParams['class'] = 'delete-form';
		$formParams['method'] = 'DELETE';
		$formParams['url'] = $url;

		$html  = $this->open($formParams);
		$html .= '<button value="submit" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-remove"></i></button>';
		$html .= $this->close();

		return $html;
	}
}