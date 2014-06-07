<?php

namespace Admin\Form;

use Zend\Form\Form;

class ParcForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('parc');
		$this->setAttribute('method', 'post');

		$this->add(array(
				'name' => 'parc_name',
				'attributes' => array('type'  => 'text'),
				'options' => array('label' => 'Nom du parc',),
		));
		$this->add(array(
				'name' => 'date',
				'type' => 'Zend\Form\Element\Date',
				'options' => array(
						'label' => "Date d'expiration",
				),
		));
		$this->add(array(
				'name' => 'num_pack',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'required' => 'required',
				),
				'options' => array(
						'label' => "type pack",
				),
		));
		$this->add(array(
				'name' => 'devis',
				'attributes' => array('type'  => 'text'),
				'options' => array('label' => 'Devise'),
		));


		$this->add(array(
				'name' => 'submit',
				'attributes' => array('type'  => 'submit', 'value' => 'Go','id' => 'submitbutton'),
		));
	}
	public function remplire($data) {
		$this->get('parc_name')->setValue($data['nomparc']);
		$this->get('date')->setValue($data['dateExpiration']);
		$this->get('devis')->setValue($data['devis']);
		$this->get('num_pack')->setValue($data['pack']);
	}
}