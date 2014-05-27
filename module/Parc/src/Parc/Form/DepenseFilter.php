<?php
namespace Parc\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class AgentFilter extends InputFilter
{
	public function __construct()
	{
   
        $this->add($factory->createInput([ 
            'name' => 'nature', 
            'required' => true, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
            ), 
        ])); 
 
        $this->add($factory->createInput([ 
            'name' => 'montant', 
            'required' => true, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
                array ( 
                    'name' => 'float', 
                ), 
 
            ), 
        ])); 
 
        $this->add($factory->createInput([ 
            'name' => 'mode_paiement', 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
            ), 
        ])); 
 
        $this->add($factory->createInput([ 
            'name' => 'banque', 
            'required' => 0, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
            ), 
        ])); 
 
        $this->add($factory->createInput([ 
            'name' => 'num_cheque', 
            'required' => 0, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
            ), 
        ])); 
 
         
 
        $this->add($factory->createInput([ 
            'name' => 'text', 
            'required' => 0, 
            'filters' => array( 
                array('name' => 'StripTags'), 
                array('name' => 'StringTrim'), 
            ), 
            'validators' => array( 
            ), 
        ])); 
 
            $this->this = $inputFilter; 
        } 
        
       
     
} 