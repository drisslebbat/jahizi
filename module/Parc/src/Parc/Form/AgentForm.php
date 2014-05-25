<?php
namespace Parc\Form;

use Zend\Form\Form;

class AgentForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('agent');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'usr_name',
            'attributes' => array('type'  => 'text'),
            'options' => array('label' => 'Nom',),
        ));
        $this->add(array(
        		'name' => 'usr_prenom',
        		'attributes' => array('type'  => 'text'),
        		'options' => array('label' => 'Prenom'),
        ));
		
        $this->add(array(
            'name' => 'usr_password',
            'attributes' => array('type'  => 'password'),
            'options' => array('label' => 'Password')));

        $this->add(array(
            'name' => 'usr_email',
            'attributes' => array('type'  => 'email'),
            'options' => array( 'label' => 'E-mail')));	

        $this->add(array(
            'name' => 'submit',
            'attributes' => array('type'  => 'submit', 'value' => 'Go','id' => 'submitbutton'),
        )); 
    }
    public function remplire($data) {
    	$this->get('usr_name')->setValue($data['nom']);
    	$this->get('usr_prenom')->setValue($data['prenom']);
    	$this->get('usr_email')->setValue($data['email']);
    	$this->get('usr_password')->setValue($data['password']);
    }
}