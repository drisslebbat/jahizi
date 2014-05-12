<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Clients for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Clients\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Clients\Entity;
use Clients\Form\ClientForm;
use Zend\InputFilter\InputFilter;
use Clients\Entity\Entrepris;

class UnclientController extends AbstractActionController
{
    public function indexAction()
    {
      $view = new ViewModel();
      return $view;
    }
    
    public function afficherAction()
    {
    	$view=new ViewModel();
    	$view->setTemplate('clients/unclient/afficherClient');
    	return $view;
    }
	
    public function ajouterAction()
    {
    	$form = new ClientForm();
    	$pos= array();
    	if ($this->request->isPost()) {
    		$post = $this->request->getPost();
    		$inputFilter = new InputFilter();
    		$form->setInputFilter($inputFilter);
    		$form->setData($post);
    		if ($form->isValid()) {
    			$pos=$form->getData();
    			$pos=$this->request->getPost();
    			$entrepris=new Entrepris();
    			$entrepris->create($form->getData());
    			$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    			$objectManager->persist($entrepris);
    			$objectManager->flush();
    			$viewModel = new ViewModel(array('form' =>$form,'donne'=>$entrepris));
    			return $viewModel;
    		}
    	}
    	$viewModel = new ViewModel(array('form' =>$form, 'donne'=>gettype($pos)));
    	return $viewModel;
    }
    
    public function fiableAction()
    {
    	$view=new ViewModel();
    	$view->setTemplate('clients/unclient/fiabliliteClient.phtml');
    	return $view;
    }
    
    public function modifierAction()
    {
    	$view=new ViewModel();
    	$view->setTemplate('clients/unclient/modifierClient.phtml');
    	return $view;
    }
    
    public function supprimerAction()
    {
    	$view=new ViewModel();
    	$view->setTemplate('clients/unclient/supprimerClient.phtml');
    	return $view;
    }
    
    
}
