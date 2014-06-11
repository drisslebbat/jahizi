<?php
namespace Vehicules\Form;
use Zend\Form\Form;
class IncidentForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => 'nrpolice',
				'attributes' => array(
						'type' => 'int',
						'required' => true
		
				),
				'options' => array(
						'label' => 'Nr de police',
				),
		));
		$this->add(array(
				'name' => "dateincident",
				'attributes' => array(
						'type' => 'Zend\Form\Element\Date',
						'required' => true
				),
				'options' => array(
						'label' => "Date de l'incident",
				),
		));
		$this->add(array(
				'name' => "expert",
				'attributes' => array(
						'type' => 'string',
						'required' => true
				),
				'options' => array(
						'label' => "expert",
				),
		));
		$this->add(array(
				'name' => 'nrpv',
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => 'N° du pv',
				),
		));
		$this->add(array(
				'name' => 'Expert désigné',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Expert désigné',
				),
		));
		$this->add(array(
				'name' => 'garage',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Garage de réparation',
				),
		));
		$this->add(array(
				'name' => 'remarques',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Remarques',
				),
		));
	$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type' => 'submit',
						'value' => 'Valider'
				),
		));}}
		
		
		
		
		
		
		
		
		
		
		
		
		
		