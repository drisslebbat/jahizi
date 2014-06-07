<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Admin for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\InputFilter\InputFilter;
use Zend\View\Model\ViewModel;
use Admin\Entity\Parc;
use Admin\Form\ParcForm;

class AdminController extends AbstractActionController
{
 public function indexAction()
    {
    	//Autentification
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	
		$em = $this->getEntityManager();
		$parcs = $em->getRepository('Admin\Entity\Parc')->findAll();
         return new ViewModel(array(
 			'parcs'	=> $parcs,
		));
        
    }
	
    public function modifierAction()
    {
    	//Autentification
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Admin', 'action' => 'login'));
    	
    	$id = $this->params()->fromRoute('id');
    	if (!$id) return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Index', 'action' => 'index'));
    	$objectManager=$this->getEntityManager();
    	$parc=$objectManager->find('Admin\Entity\Parc',$id);
    	$form = new ParcForm();
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setInputFilter(new ParcFilter());
    		$form->setData($request->getPost());
    		if ($form->isValid()) {
    			$data = $form->getData();
    			$parc->create($data);
    			$objectManager->persist($parc);
    			$objectManager->flush();
    			return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Index', 'action' => 'index'));
    		}
    	}
    	else {
    		$form->remplire($parc->getArrayCopy());
    	
    	return new ViewModel(array('form' => $form, 'id' => $id));
    }
    }
	
	public function ajouterAction()
	{
		//Autentification
		$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
		if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Admin', 'action' => 'login'));
		
		$form = new ParcForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new InputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$parc=new Parc();
				$parc->create($data);
				$objectManager=$this->getEntityManager();
				$objectManager->persist($parc);
				$objectManager->flush();
				
				return $this->redirect()->toRoute(NULL, array('controller' => 'Admin', 'action' => 'index'));
			}
		}
		return new ViewModel(array('form' => $form));
	}	
	

	public function activeAction()
	{
		//Autentification
		$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
		if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Admin', 'action' => 'login'));
		

		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager=$this->getEntityManager();
			$parc=new Parc();
			$parc=$objectManager->getRepository('Admin\Entity\Parc')->find($id);
			if($parc->active())
			{
				$parc->setActive(false);
				return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Index','action' => 'index'));
				
			}
			else
			{
				$parc->setActive(true);
				return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Index','action' => 'index'));
			}
			return new ViewModel(array(
					'parc'	=> $parc,
			));
				
		}
	}
	public function afficherAction()
	{
		//Autentification
		$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
		if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Admin', 'action' => 'login'));
		
		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager=$this->getEntityManager();
			$parc=$objectManager->getRepository('Admin\Entity\Parc')->find($id);
			return new ViewModel(array(
					'parc'	=> $parc,
			));
			
		}
	}
	public function supprimerAction() 
	{
		//Autentification
		$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
		if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Admin', 'action' => 'login'));
		

		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager = $this->getEntityManager();
			$parc = $objectManager->getRepository('Admin\Entity\Parc')->find($id);
			$objectManager->remove($parc);
			$objectManager->flush();
			$this->flashMessenger()->addSuccessMessage('Parc Supprimé');
		}
		return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Index','action' => 'index'));
	}
	
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
	

	

	
}
