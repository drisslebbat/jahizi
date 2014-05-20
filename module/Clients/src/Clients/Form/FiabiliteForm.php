<?php
namespace Clients\Form;
use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class FiabiliteForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('Statut_Client');
		$this->add(array(
				'name' => 'cause',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Cause',
				),
				)
				);
		$this->add(array(
				'name' => 'statut',
				'type' => 'Zend\Form\Element\Radio',
				'attributes' => array(
						'required' => 'required',
						'value' => '0',
				),
				'options' => array(
						'label' => 'Type Client',
						'value_options' => array(
								'0' => 'Fiable ',
								'1' => ' Non Fiable',
						),
				),
		));
		$this->add(array(
				'name' => 'remarque',
				'type' => 'Zend\Form\Element\Textarea',
				'attributes' => array(
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Remarque',
				),
		));
		
		
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Go',
						'id' => 'submitbutton',
				),
		));
	}
}
		
