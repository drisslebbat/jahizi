<?php
namespace Autorisation\Form;

use Zend\Form\Form;

class AutorisationForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('Autoristation');
		$this->setAttribute('method', 'post');
	}
}