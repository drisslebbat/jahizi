<?php
namespace Vehicules\Form;
use Zend\Form\Form;
class CarburantForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => 'vendeur',
				'attributes' => array(
						'type' => 'string',
				),
				'options' => array(
						'label' => 'Le vendeur',
				),
		));
		$this->add(array(
				'name' => 'type',
				'attributes' => array(
						'type' => 'string',
				),
				'options' => array(
						'label' => 'Type',
				),
		));
		$this->add(array(
				'name' => 'coovendeur',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Coordonnées vendeur',
				),
		));
		$this->add(array(
				'name' => 'nbrlitre',
				'attributes' => array(
						'type' => 'int',
						'required' => true
		
				),
				'options' => array(
						'label' => 'Nombre de litres',
				),
		));
		$this->add(array(
				'type' => 'Zend\Form\Element\Select',
				'name' => 'typecarb',
				'options' => array(
						'label' => 'Type de carburant',
						'value_options' => array(
									
								'' => 'choisissez votre type de carburant',
								'Gasoil' => 'Gasoil',
								'Hybride' => 'Hybride',
								'Essence' => 'Essence',
						),
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
				'name' => 'datepaiement',
				'attributes' => array(
						'type' => 'Zend\Form\Element\Date',
				),
				'options' => array(
						'label' => 'Date paiement',
				),
		));
		$this->add(array(
				'name' => 'modereg',
				'attributes' => array(
						'type' => 'Zend\Form\Element\Select',
						
				),
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		