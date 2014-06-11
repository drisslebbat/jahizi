<?php
namespace Vehicules\Form;
use Zend\Form\Form;
use Zend\Form\Element;
class optionForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		
		$libellee = new Element\Text('libellee');
		$libellee->setLabel('Libellé');
		$libellee->setAttributes(array(
				'required' => true,
				'validators' => array(
						array(
								'name' => 'StringLength',
								'options' => array(
										'encoding' => 'UTF-8',
										'min' => 1,
										'max' => 3,
								),
						),
			'class' => 'libellee'))
		);
		$this->add($libellee);
// 		$this->add(array(
// 				'name' => 'libellee',
// 				'required' => true,
// 				'attributes' => array(
// 						'type' => 'text',
// 				),
// 				'options' => array(
// 						'label' => 'Nom-Option',
// 				),
// 		));
		$this->add(array(
				'name' => 'remarques',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'remarque',
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