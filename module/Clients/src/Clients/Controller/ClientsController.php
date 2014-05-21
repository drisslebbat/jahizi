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
    	$view=new ViewModel();
    	$view->setTemplate('clients/clients/merge');
    	return $view;
    }
    
    public function listerAction()
    {
    	$view=new ViewModel();
    	$view->setTemplate('clients/clients/lister.phtml');
    	return $view;
    }
    
    public function listernoirAction()
    {
    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
//     	 $clients = $em->getRepository('Clients\Entity\Client')->findBy(array(), array('nom' => 'ASC'));
		$querybuilder=$em->getRepository('Clients\Entity\Client')->createQueryBuilder('c');
		$query=$querybuilder->getQuery();
		$clients=$query->getResult();
		
    	return new ViewModel(array('clients' => $clients));
    }
    
}