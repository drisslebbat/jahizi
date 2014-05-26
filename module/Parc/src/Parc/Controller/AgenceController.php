<?php

namespace Parc\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Parc\Entity\Agence;
use Parc\Form\AgenceForm;
use Parc\Form\AgenceFilter;

/**
 * AgenceController
 *
 * @author
 *
 * @version
 *
 */
class AgenceController extends AbstractActionController {
	public function indexAction()
	{
		$em = $this->getEntityManager();
		$agences = $em->getRepository('Parc\Entity\Agence')->findAll();
		return new ViewModel(array(
				'agences'	=> $agences,
		));
	}
	
	public function modifierAction()
	{
		$id = $this->params()->fromRoute('id');
		if (!$id) return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Agence', 'action' => 'Index'));
		$objectManager=$this->getEntityManager();
		$agence=$objectManager->find('Parc\Entity\Agence',$id);
		$form = new AgenceForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new AgenceFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$agence->create($data);
				$objectManager->persist($agence);
				$objectManager->flush();
				return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Agence', 'action' => 'index'));
			}
		}
		else {
			$form->remplire($agence->getArrayCopy());
			 
			return new ViewModel(array('form' => $form, 'id' => $id));
		}
	}
	
	public function ajouterAction()
	{
		$form = new AgenceForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new AgenceFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$agence=new Agence();
				$agence->create($data);
				$objectManager=$this->getEntityManager();
				$objectManager->persist($agence);
				$objectManager->flush();
				//$this->getUsersTable()->insert($data);
				return $this->redirect()->toRoute(NULL, array('controller' => 'Agence', 'action' => 'index'));
			}
		}
		return new ViewModel(array('form' => $form));
	}
	
	
	public function afficherAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager=$this->getEntityManager();
			$agence=$objectManager->getRepository('Parc\Entity\Agence')->find($id);
			return new ViewModel(array(
					'agence'	=> $agence,
			));
				
		}
	}
	public function supprimerAction()
	{
	
		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager = $this->getEntityManager();
			$agence = $objectManager->getRepository('Parc\Entity\Agence')->find($id);
			$objectManager->remove($agence);
			$objectManager->flush();
			$this->flashMessenger()->addSuccessMessage('Agence Supprimé');
		}
		return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Agence','action' => 'index'));
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