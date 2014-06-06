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



class ClientsController extends AbstractActionController
{
    
 
    public function mergeAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$view=new ViewModel();
    	$view->setTemplate('clients/clients/merge');
    	return $view;
    }
    
    public function listerAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$view=new ViewModel();
    	$view->setTemplate('clients/clients/lister.phtml');
    	return $view;
    }
    
    public function listernoirAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
     	 $clients = $em->getRepository('Clients\Entity\Client')->findBy( array('statut' => 'Non Fiable'));
	
		
    	return new ViewModel(array('clients' => $clients));
    }
    
}