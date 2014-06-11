<?php
// filename : module/Users/src/Users/Form/addForm.php
namespace Vehicules\Form;
use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
class marqueForm extends Form implements ObjectManagerAwareInterface
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
	parent::__construct();

	$this->objectManager = $objectManager;
	$this->init();
}
	public function init(){
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/formdata');
		$this->add(array(
				'name' => "annee",
				'attributes' => array(
						'type' => 'int',
				),
				'options' => array(
						'label' => "année_Marque",
				),
		));
		
		$this->add(array(
				'name' => 'nom',
				'attributes' => array(
						'type' => 'string',
				),
				'options' => array(
						'label' => 'Marque',
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
				
		