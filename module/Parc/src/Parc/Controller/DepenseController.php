<?php

namespace Parc\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Parc\Form\DepenseForm;
use Zend\InputFilter\InputFilter;
use Parc\Entity\Depenses;

/**
 * DepenseController
 *
 * @author
 *
 * @version
 *
 */
class DepenseController extends AbstractActionController {
public function indexAction()
	{
		$em = $this->getEntityManager();
		$depenses = $em->getRepository('Parc\Entity\Depenses')->findAll();
		return new ViewModel(array(
				'depenses'	=> $depenses,
		));
	}
	
	public function modifierAction()
	{
		$id = $this->params()->fromRoute('id');
		if (!$id) return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Depense', 'action' => 'Index'));
		$objectManager=$this->getEntityManager();
		$depense=$objectManager->find('Parc\Entity\Depenses',$id);
		$form = new DepenseForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new DepenseFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$depense->create($data);
				$objectManager->persist($depense);
				$objectManager->flush();
				return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Depense', 'action' => 'index'));
			}
		}
		else {
			$form->remplire($depense->getArrayCopy());
			 
			return new ViewModel(array('form' => $form, 'id' => $id));
		}
	}
	
	public function ajouterAction()
	{
		$form = new DepenseForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new InputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$depense=new Depenses();
				$depense->create($data);
				$objectManager=$this->getEntityManager();
				$objectManager->persist($depense);
				$objectManager->flush();
				
				return $this->redirect()->toRoute(NULL, array('controller' => 'Depense', 'action' => 'index'));
			}
		}
		return new ViewModel(array('form' => $form));
	}
	
	
	public function afficherAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager=$this->getEntityManager();
			$depense=$objectManager->getRepository('Parc\Entity\Depenses')->find($id);
			return new ViewModel(array(
					'Depense'	=> $Depense,
			));
				
		}
	}
	public function supprimerAction()
	{
	
		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager = $this->getEntityManager();
			$Depense = $objectManager->getRepository('Parc\Entity\Depenses')->find($id);
			$objectManager->remove($depense);
			$objectManager->flush();
			$this->flashMessenger()->addSuccessMessage('Depense Supprimé');
		}
		return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Depense','action' => 'index'));
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