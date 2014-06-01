<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Authentication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Authentification\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Authentification\Form\LoginForm;
use Authentification\Form\LoginFilter;
use Zend\View\Model\ViewModel;
use Zend\InputFilter\InputFilter;

class AuthentificationController extends AbstractActionController
{
	public function loginAction()
	{
		$form = new LoginForm();
		$form->get('submit')->setValue('Login');
		$messages = null;
	
		$request = $this->getRequest();
		if ($request->isPost()) {
			$filter=new InputFilter();
			$form->setInputFilter($filter);
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				
	
				
				$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
			
				$adapter = $authService->getAdapter();
				$adapter->setIdentityValue($data['email']); //$data['usr_name']
				$adapter->setCredentialValue($data['password']); // $data['usr_password']
				$authResult = $authService->authenticate();
				
				if ($authResult->isValid()) {
					$identity = $authResult->getIdentity();
					$authService->getStorage()->write($identity);
					$time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days
					//-					if ($data['rememberme']) $authService->getStorage()->session->getManager()->rememberMe($time); // no way to get the session
					if ($data['rememberme']) {
						$sessionManager = new \Zend\Session\SessionManager();
						$sessionManager->rememberMe($time);
					}
					//- return $this->redirect()->toRoute('home');
				}
				foreach ($authResult->getMessages() as $message) {
					$messages .= "$message\n";
				}
	
				/*
					$identity = $authenticationResult->getIdentity();
				$authService->getStorage()->write($identity);
	
				$authenticationService = $this->serviceLocator()->get('Zend\Authentication\AuthenticationService');
				$loggedUser = $authenticationService->getIdentity();
				*/
			}
		}
		return new ViewModel(array(
				'error' => 'Your authentication credentials are not valid',
				'form'	=> $form,
				'messages' => $messages,
		));
	}
}
