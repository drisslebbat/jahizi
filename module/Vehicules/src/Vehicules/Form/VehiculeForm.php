<?php
// filename : module/Users/src/Users/Form/addForm.php
namespace Vehicules\Form;
use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
class VehiculeForm extends Form implements ObjectManagerAwareInterface
{ 
protected $objectManager;
public function setObjectManager(ObjectManager $objectManager)
{
    $this->objectManager = $objectManager;
}

public function getObjectManager()
{
    return $this->objectManager;
}
	//public function init()
public function __construct(ObjectManager $objectManager)
{
	parent::__construct('add');

	$this->objectManager = $objectManager;
	$this->init();
}
	public function init(){
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => 'matricule',
				'attributes' => array(
						'type' => 'text',
						'required' => true
				),
				'options' => array(
						'label' => 'Matricule',
				),
		));
	
		
		$this->add(array(
				 'type' => 'Zend\Form\Element\Select',
				 'name' => 'carburant',
				 'options' => array(
						 'label' => 'Carburant',
						 'value_options' => array(
						 		
								 'Essence' => 'Essence',
								 'Gasoil' => 'Gasoil',
						 		 'Hybride' => 'Hybride',
		 ),
		 )
		 ));
		$this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectMultiCheckbox',
				'required' => false,
            'name' => 'option',
            'options' => array(
                'label' => 'Options Véhicule',
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Vehicules\Entity\optionsvehicule',
            		'property'   => 'libellee',
            		'required' => false,
                  )));   
		$this->add(array(
				'type' => 'DoctrineModule\Form\Element\ObjectSelect',
				'name' => 'categorie',
				'options' => array(
						'label' => 'categorie',
						'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Vehicules\Entity\categorie',
            		'property'   => 'idcat',
						
				)
		));
			$this->add(array(
				'type' => 'DoctrineModule\Form\Element\ObjectSelect',
				'name' => 'modele',
				'options' => array(
						'label' => 'Modèle',
						'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Vehicules\Entity\modele',
            		'property'   => 'nom',
				)
		));
		/*$this->add(array(
				'type' => 'DoctrineModule\Form\Element\ObjectSelect',
				'name' => 'modele',
				'options' => array(
						'label' => 'modele',
						'object_manager' => $this->getObjectManager(),
						'target_class'   => 'Vehicules\Entity\modele',
						'property'   => 'nom',
						'is_method'      => true,
						'find_method'    => array(
								'name'   => 'findBy',
								'params' => array(
										'criteria' => array('active' => 1),
		
										// Use key 'orderBy' if using ORM
										'orderBy'  => array('lastname' => 'ASC'),
		
										// Use key 'sort' if using ODM
										'sort'  => array('lastname' => 'ASC')
								),
						),
				),
		));*/
		$this->add(array(
				'type' => 'DoctrineModule\Form\Element\ObjectSelect',
				'name' => 'marque',
				'options' => array(
						'label' => 'Marque',
						'object_manager' => $this->getObjectManager(),
						'target_class'   => 'Vehicules\Entity\marque',
						'property'   => 'nom',
				)
		));
		
		$this->add(array( 
				'name' => 'datemisecirculation',
				'attributes' => array(
						'type' => 'Zend\Form\Element\Date',
				),
				'options' => array(
						'label' => 'Date de Mise en Circulation',
				),
		));
		$this->add(array(
				'name' => 'numchasis',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Numero de Chasis',
				),
		));
		$this->add(array(
				'name' => "prixachat",
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => "Prix d'achat",
				),
		));
		
		$this->add(array(
				'name' => 'concessionnaire',
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'concessionnaire',
				),
		));
		$this->add(array(
				'type' => 'Zend\Form\Element\Radio',
				'name' => 'souslocation',
				'options' => array(
						'label' => 'Sous-location',
						'value_options' => array(
									
								'Non' => 'Non',
								'Oui' => 'Oui',
								
		
						),
				)
		));
		$this->add(array(
				'type' => 'Zend\Form\Element\Select',
				'name' => 'status',
				'options' => array(
						'label' => 'Status',
						'value_options' => array(
									
								' ' => ' ',
								'libre' => 'libre',
								'reservée' => 'reservée',
								'indisponible' => 'indisponible',
								'Hors service' => 'Hors service',
								
						),
				)
		));
		$this->add(array(
				'name' => 'remarque',
				'attributes' => array(
						'type' => 'Zend\Form\Element\Textarea',
						
				),
				'options' => array(
						'label' => 'remarque',
						
				),
		)); 
		$this->add(array(
				'name' => 'puisfiscal',
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => "puissance fiscale",
				),
		));
		$this->add(array(
				'type' => 'Zend\Form\Element\Select',
				'name' => 'nbreport',
				'options' => array(
						'label' => 'Nombre de portes',
						'value_options' => array(
									
								'4' => '4',
								'2' => '2',
								'5' => '5',
								'6' => '6',
								'7' => '7',
								'8' => '8',
						),
				)
		));
	
		
		$this->add(array(
				'name' => 'dernierKm',
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => 'Dernier  kilométrage',
				),
		));
		
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type' => 'submit',
						'value' => 'Valider'
				),
				));
	}}
				
		