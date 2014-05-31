<?php 
namespace Parc\Form; 

use Zend\Captcha; 
use Zend\Form\Element; 
use Zend\Form\Form; 

class DepenseForm extends Form 
{ 
    public function __construct($name = null) 
    { 
        parent::__construct('Depense'); 
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array( 
            'name' => 'nature', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array(
                'required' => 'required', 
            ), 
            'options' => array('label' => 'Nature'), 
        )); 
 
        $this->add(array( 
            'name' => 'montant', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'required' => 'required', 
            ), 
            'options' => array( 
            		'label' => 'Montant'
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'mode_paiement', 
            'type' => 'Zend\Form\Element\Radio', 
            'attributes' => array( 
                'required' => 'required', 
                'value' => '0', 
            ), 
            'options' => array( 
                'label' => 'mode paeiment', 
                'value_options' => array(
                    '0' => 'espece', 
                    '1' => 'cheque', 
                    '2' => 'virement ', 
                ),
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'banque', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Type something...', 
            
            ), 
            'options' => array( 
                'label' => 'Banque', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'num_cheque', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Type something...', 
                 
            ), 
            'options' => array( 
                'label' => 'N° cheque', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'date', 
            'type' => 'Zend\Form\Element\Date', 
            'options' => array( 
                'label' => 'Date Paiement', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'remarque', 
            'type' => 'Zend\Form\Element\Textarea', 
            'attributes' => array( 
                'placeholder' => 'Type something...',  
            ), 
            'options' => array( 
                'label' => 'remarques', 
            ), 
        )); 
 		
        $this->add(array(
        		'name' => 'submit',
        		'type' => 'Submit',
        		'attributes' => array(
        				'value' => 'Go',
        				'id' => 'submitbutton',
        		)));
         }

         public function remplire($data) {
         	$this->get('nature')->setValue($data['nature']);
         	$this->get('montant')->setValue($data['mantant']);
         	$this->get('mode_paiement')->setValue($data['modereg']);
         	$this->get('banque')->setValue($data['banque']);
         	$this->get('num_cheque')->setValue($data['numcheque']);
         	$this->get('date')->setValue($data['datepaiement']);
         	$this->get('remarque')->setValue($data['remarque']);
         }
} 