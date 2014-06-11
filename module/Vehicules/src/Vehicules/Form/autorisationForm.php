<?php
namespace Vehicules\Form;
use Zend\Form\Form;
class AutorisationForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => 'num',
				'attributes' => array(
						'type' => 'int',
						'required' => true
		
				),
				'options' => array(
						'label' => 'N° autorisation',
				),
		));
		$this->add(array(
				'name' => 'datedebut',
				'attributes' => array(
						'type' => 'Zend\Form\Element\Date',
						'required' => true
				),
				'options' => array(
						'label' => 'Date début',
				),
		));
		$this->add(array(
				'name' => "dateexp",
				'attributes' => array(
						'type' => 'Zend\Form\Element\Date',
						'required' => true
				),
				'options' => array(
						'label' => "Date d'expiration",
				),
		));
		
	$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type' => 'submit',
						'value' => 'Valider'
				),
		));}}
		
		
		
		
		
		
		
		
		
		
		
		
		
		