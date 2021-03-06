<?php
namespace Vehicules\Form;
use Zend\Form\Form;
class VignetteForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => 'datepaiement',
				'attributes' => array(
						'type' => 'int',
						'required' => true
		
				),
				'options' => array(
						'label' => 'Date paiement',
				),
		));
		$this->add(array(
				'name' => 'type',
				'attributes' => array(
						'type' => 'string',
				),
				'options' => array(
						'label' => 'Type',
				)
		));
		$this->add(array(
				'name' => 'montant',
				'attributes' => array(
						'type' => 'int',
						'required' => true
				),
				'options' => array(
						'label' => 'Montant TTC',
				),
		));
		$this->add(array(
				'type' => 'Zend\Form\Element\Select',
				'name' => 'modereg',
				'options' => array(
						'label' => 'Mode de réglement',
						'value_options' => array(
									
								'Espèce' => 'Espèce',
								'Chèque' => 'Chèque',
								'En ligne' => 'En ligne',
								'Virement bancaire' => 'Virement bancaire',
						),
				)
		));
		$this->add(array(
				'name' => 'numcheq',
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => 'N° de chèque',
				)
		));
		$this->add(array(
				'name' => 'banque',
				'attributes' => array(
						'type' => 'string',
				),
				'options' => array(
						'label' => 'Banque',
				)
		));
		$this->add(array(
				'name' => 'remarque',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Remarques',
				)
		));
	$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type' => 'submit',
						'value' => 'Valider'
				),
		));}}
		
		
		
		
		
		
		
		
		
		
		
		
		
		