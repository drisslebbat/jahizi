<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * ClientsController
 *
 * @author
 *
 * @version
 *
 */
class ClientsController extends AbstractActionController {
	/**
	 * The default action - show the home page
	 */
	public function indexAction() {
		// TODO Auto-generated ClientsController::indexAction() default action
		return new ViewModel ();
	}
}