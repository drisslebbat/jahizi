<?php
namespace Vehicules\Form;
use Zend\Form\Form;
class categorieForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		
		
	
		$this->add(array(
				'name' => 'idcat',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'nom catégorie',
				),
		));
		$this->add(array(
				'name' => 'prixcat',
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => 'Prix catégorie',
				),
		));
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type' => 'submit',
						'value' => 'Valider'
				),
		));
		}}