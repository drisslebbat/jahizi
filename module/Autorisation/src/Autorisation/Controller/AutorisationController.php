<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Autorisation for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Autorisation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Autorisation\Form\AutorisationForm;
use Zend\InputFilter\InputFilter;
use Zend\Form\Form;
// use Autorisation\Entity\Ressource;
// use Autorisation;

class AutorisationController extends AbstractActionController
{
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;
	
	public function getEntityManager()
	{
		if (null === $this->em) {
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}
		return $this->em;  
	}
    public function indexAction()
    {
    	//$id = $this->params()->fromRoute('id');
    	$id=1;
    	$droits=$this->getEntityManager()->getRepository('Autorisation\Entity\Droit')->findBy(array('idagent'=>$id));
    	return new ViewModel(array(
    		'droits'=>$droits,
    			'idAgent'=>$id,
    	));
    }
    public function modifierAction()
    {
    	//$id = $this->params()->fromRoute('id');
    	$id=1;
    	
    	$classes=$this->getEntityManager()->getRepository('Autorisation\Entity\Ressource')->findAll();
    	$form=$this->remplireAutorisationForm($classes,$id);
    	if ($this->getRequest()->isPost()) {
    		$form->setInputFilter(new InputFilter());
    		//$form->setData($this->getRequest()->getPost());
    		//if ($form->isValid()) {
    			$data = $this->request->getPost();
    			//$data=$form->getData();
    			$this->modifierAutorisation($classes, $id, $data);
    	
    			return $this->redirect()->toRoute(NULL, array('controller' => 'Autorisation', 'action' => 'index'));
    		//}
    	}
    	
    	
    	return new ViewModel(array(
    			'id'=>$id,
    			'form'=>$form,
    			'classes'=>$classes
    	));
    	
    }

   public function createDroitForm() {
   	$form=new AutorisationForm();
   	$classes=$this->getEntityManager()->getRepository('Autorisation\Entity\Ressource')->findAll();
   	foreach ($classes as $classe){
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomclass().'c',
   				'options' => array(
   						'label' => 'Create',
   						'use_hidden_element' => false,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomclass().'r',
   				'options' => array(
   						'label' => 'Read',
   						'use_hidden_element' => false,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomclass().'u',
   				'options' => array(
   						'label' => 'Update',
   						'use_hidden_element' => true,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomclass().'d',
   				'options' => array(
   						'label' => 'Delate',
   						'use_hidden_element' => false,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		
   	}
   	$form->add(array(
   			'type' => 'Zend\Form\Element\Submit',
   			'name' => 'submit',
   			'options' => array(
   					'label' => 'OK',
   			)
   	));
   	return $form;
   }
   public function remplireAutorisationForm($classes,$id) {
   	$form=$this->createDroitForm();
   	foreach ($classes as $classe)
   	{
   		$droit=$this->getEntityManager()->getRepository('Autorisation\Entity\Droit')->findOneBy(array('idagent'=>$id,'idclass'=>$classe));
   	
   		if($droit->getDroitCreate()){
   			$form->get($droit->getIdclass()->getNomclass().'c')->setValue(1);
   		}
   		else {
   			$form->get($droit->getIdclass()->getNomclass().'c')->setValue(0);
   		}
   		if(!$droit->getDroitRead()){
   			$form->get($droit->getIdclass()->getNomclass().'r')->setValue(0);
   		}
   		else {
   			$form->get($droit->getIdclass()->getNomclass().'r')->setValue(1);
   		}
   		if(!$droit->getDroitUpdate()){
   			$form->get($droit->getIdclass()->getNomclass().'u')->setValue(0);
   		}
   		else {
   			$form->get($droit->getIdclass()->getNomclass().'u')->setValue(1);
   		}
   		if(!$droit->getDroitDelete()){
   			$form->get($droit->getIdclass()->getNomclass().'d')->setValue(0);
   		}
   		else {
   			$form->get($droit->getIdclass()->getNomclass().'d')->setValue(1);
   		}
   	}
   	return $form;
   	
   }
   public function modifierAutorisation($classes,$id,$data) {
   	$objectManager=$this->getEntityManager();
   	foreach ($classes as $classe)
   	{
   		
   		$droit=$objectManager->getRepository('Autorisation\Entity\Droit')->findOneBy(array('idagent'=>$id,'idclass'=>$classe));
   		$droit->setDroitCreate($data[$droit->getIdclass()->getNomclass().'c']);
   		$droit->setDroitRead($data[$droit->getIdclass()->getNomclass().'c']);
   		$droit->setDroitUpdate($data[$droit->getIdclass()->getNomclass().'c']);
   		$droit->setDroitDelete($data[$droit->getIdclass()->getNomclass().'c']);
   		$objectManager->persist($droit);
   		
   	}
   	$objectManager->flush();
   }
}
