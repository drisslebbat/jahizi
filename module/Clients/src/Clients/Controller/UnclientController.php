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
    	$view=new ViewModel();
    	$view->setTemplate('clients/unclient/ajouter');
    	return $view;
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
