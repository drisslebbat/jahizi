<?php
namespace Clients\Form;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class ClientForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('client');
		$this->add(array(
				'name' => 'nom',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Nom',
				),
		));

		$this->add(array(
				'name' => 'prenom',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Prenom',
				),
		));

		$this->add(array(
				'name' => 'email',
				'type' => 'Zend\Form\Element\Email',
				'attributes' => array(
						'placeholder' => 'Email Address...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Email',
				),
		));

		$this->add(array(
				'name' => 'type',
				'type' => 'Zend\Form\Element\Radio',
				'attributes' => array(
						'required' => 'required',
						'value' => '0',
				),
				'options' => array(
						'label' => 'Type Client',
						'value_options' => array(
								'0' => 'Particulier ',
								'1' => ' Entreprise',
								'2' => ' Association ',
								'3' => 'Administration',
						),
				),
		));

		$this->add(array(
				'name' => 'Entreprise',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
				),
				'options' => array(
						'label' => 'Entreprise',
				),
		));

		$this->add(array(
				'name' => 'Nationalite',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Nationalite',
				),
		));

		$this->add(array(
				'name' => 'date_naissance',
				'type' => 'Zend\Form\Element\Date',
				'attributes' => array(
						'placeholder' => 'Type something...',
						
				),
				'options' => array(
						'label' => 'Date de naissance',
				),
		));

		$this->add(array(
				'name' => 'passport',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						
				),
				'options' => array(
						'label' => 'numero de passport',
				),
		));

		$this->add(array(
				'name' => 'cin',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => "code d'identite natlional",
            ),
            'options' => array(
                'label' => 'CIN',
            ),
        ));

        $this->add(array(
            'name' => 'num_permis',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Type something...',
                
            ),
            'options' => array(
                'label' => 'numero de permis',
            ),
        ));

        $this->add(array(
            'name' => 'date_permis',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'placeholder' => 'Type something...',
               
            ),
            'options' => array(
                'label' => 'Date delivrance permis',
            ),
        ));

        $this->add(array(
            'name' => 'Adresse',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Type something...',
                
            ),
            'options' => array(
                'label' => 'Adresse',
            ),
        ));

        $this->add(array(
            'name' => 'Raison_social',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Type something...',
                
            ),
            'options' => array(
                'label' => 'Raison social',
            ),
        ));

        $this->add(array(
            'name' => 'inter_fin',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Type something...',
            ),
            'options' => array(
                'label' => 'IF',
            ),
        ));

        $this->add(array(
        		'name' => 'tel',
        		'type' => 'Zend\Form\Element\Text',
        		'attributes' => array(
        				'placeholder' => 'Type something...',
        		),
        		'options' => array(
        				'label' => 'Numero de Tel',
        		),
        ));

        $this->add(array(
            'name' => 'rc',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Type something...',
            ),
            'options' => array(
                'label' => 'RC',
            ),
        ));

        $this->add(array(
            'name' => 'Lieu_permis',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Type something...',
                
            ),
            'options' => array(
                'label' => 'Lieu delivrance permis',
            ),
        ));

        $this->add(array(
            'name' => 'Date_cin',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'placeholder' => 'Type something...',
                
            ),
            'options' => array(
                'label' => 'Date delivrance CIN',
            ),
        ));

        $this->add(array(
            'name' => 'Date_passport',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'placeholder' => 'Type something...',
            
                
            ),
            'options' => array(
                'label' => 'Date delivrance passport',
            ),
        ));

        $this->add(array(
            'name' => 'remarque',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
            ),
        ));

        
        $this->add(array(
        		'name' => 'submit',
        		'type' => 'Submit',
        		'attributes' => array(
        				'value' => 'Go',
        				'id' => 'submitbutton',
        ),
        ));
	}
	}