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
    	$id = $this->params()->fromRoute('id');
    	$droits=$this->getEntityManager()->getRepository('Autorisation\Entity\Droit')->findBy(array('idAgent'=>$id));
    	return new ViewModel(array(
    		'droits'=>$droits,
    			'idAgent'=>$id,
    	));
    }
    public function modifierAction()
    {
    	$id = $this->params()->fromRoute('id');
    	$droits=$this->getEntityManager()->get('Autorisation\Entity\Droit')->findBy(array('idAgent'=>$id));
    	
    }

   public function createDroitForm() {
   	$form=new Form();
   	$classes=$this->getEntityManager()->getRepository('Autorisation\Entity\Ressource')->findAll();
   	foreach ($classes as $classe){
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomlass().'c',
   				'options' => array(
   						'label' => 'Create',
   						'use_hidden_element' => true,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomlass().'r',
   				'options' => array(
   						'label' => 'Read',
   						'use_hidden_element' => true,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomlass().'u',
   				'options' => array(
   						'label' => 'Update',
   						'use_hidden_element' => true,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		$form->add(array(
   				'type' => 'Zend\Form\Element\Checkbox',
   				'name' => $classe->getNomlass().'d',
   				'options' => array(
   						'label' => 'Delate',
   						'use_hidden_element' => true,
   						'checked_value' => true,
   						'unchecked_value' => false,
   				)
   		));
   		
   	}
   	return $form;
   }
}
