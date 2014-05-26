<?php
namespace Parc\Form;

use Zend\Form\Form;

class AgenceForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('agence');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'agence_name',
            'attributes' => array('type'  => 'text'),
            'options' => array('label' => 'Nom',)));
        
        $this->add(array(
        		'name' => 'agence_email',
        		'attributes' => array('type'  => 'email'),
        		'options' => array( 'label' => 'E-mail')));
        
        $this->add(array(
        		'name' => 'agence_couleur',
        		'attributes' => array('type'  => 'text'),
        		'options' => array('label' => 'Couleur'),
        ));
		
        $this->add(array(
            'name' => 'agence_site',
            'attributes' => array('type'  => 'text'),
            'options' => array('label' => 'Site')));
        
        $this->add(array(
        		'name' => 'submit',
        		'attributes' => array('type'  => 'submit', 'value' => 'Go','id' => 'submitbutton'),
        ));

      
    }
    public function remplire($data) {
    	$this->get('agence_name')->setValue($data['nom']);
    	$this->get('agence_site')->setValue($data['site']);
    	$this->get('agence_email')->setValue($data['email']);
    	$this->get('agence_couleur')->setValue($data['couleur']);
    }
}