<?php
namespace Parc\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class AgentFilter extends InputFilter
{
	public function __construct()
	{
		// self::__construct(); // parnt::__construct(); - trows and error
		$this->add(array(
			'name'     => 'usr_name',
			'required' => false,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 1,
						'max'      => 100,
					),
				),
			),
		));
		$this->add(array(
				'name'     => 'usr_prenom',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'validators' => array(
						array(
								'name'    => 'StringLength',
								'options' => array(
										'encoding' => 'UTF-8',
										'min'      => 1,
										'max'      => 100,
								),
						),
				),
		));

        $this->add(array(
            'name'       => 'usr_email',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
            ),
        ));
		
		$this->add(array(
			'name'     => 'usr_password',
			'required' => false,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 6,
						'max'      => 12,
					),
				),
			),
		));
	}
	public function remplire($data) {
		$this->get('usr_name')->setValue($data['nom']);
		$this->get('prenom')->setValue($data['prenom']);
		$this->get('user_email')->setValue($data['emailClient']);
		$this->get('usr_password')->setValue($data['type']);
	}
}