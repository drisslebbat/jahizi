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

class UnclientController extends AbstractActionController
{
    public function indexAction()
    {
      $view = new ViewModel();
      return $view;
    }
    
    public function afficherAction()
    {
    	return array();
    }
	
    public function ajouterAction()
    {
    	return array();
    }
    
    public function fiableAction()
    {
    	return array();
    }
    
    public function modifierAction()
    {
    	return array();
    }
    
    public function supprimerAction()
    {
    	return array();
    }
}
