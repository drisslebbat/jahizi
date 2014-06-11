<?php
namespace Vehicules\Form;
use Zend\Form\Form;
class VidangeForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('option');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => 'datevidange',
				'attributes' => array(
						'type' => 'Zend\Form\Element\Date',
						'required' => true
		
				),
				'options' => array(
						'label' => 'Date vidange',
				),
		));
		$this->add(array(
				'name' => 'km',
				'attributes' => array(
						'type' => 'int',
						'required' => true
		
				),
				'options' => array(
						'label' => 'Kilomètrage',
				),
		));
		$this->add(array(
				'name' => 'kmprochain',
				'attributes' => array(
						'type' => 'int',
						'required' => true
		
				),
				'options' => array(
						'label' => 'Kilomètrage prochain',
				),
		));
	
		$this->add(array(
				'type' => 'Zend\Form\Element\Select',
				'name' => 'options',
				'options' => array(
						'label' => 'Options',
						'value_options' => array(
									
								'Filtre huile' => 'Filtre huile',
								'Filtre essence' => 'Filtre essence',
								'Filtre air' => 'Filtre air',
								'Courroie de distribution' => 'Courroie de distribution',
								'Courroie alternateur' => 'Courroie alternateur',
								'Courroie climatiseur' => 'Courroie climatiseur',
								'Bougies' =>'Bougies',
								'Plaquettes' =>'Plaquettes'
						),
				)
		));
		$this->add(array(
				'name' => 'garage',
				'attributes' => array(
						'type' => 'string',
						
				),
				'options' => array(
						'label' => 'Garage',
				),
		));
		$this->add(array(
				'name' => "coogarage",
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => "Coordonnées garage",
				),
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
						'label' => 'banque',
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		