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
use Authentification\Form\ForgottenPasswordForm;
use Authentification\Form\ForgottenPasswordFilter;
use Zend\Mail\Message;

class AuthentificationController extends AbstractActionController
{
	public function loginAction()
	{
		$form = new LoginForm();
		$form->get('submit')->setValue('Login');
		$messages = null;
	
		$request = $this->getRequest();
		if ($request->isPost()) {
// 			$filter=new InputFilter();
			$form->setInputFilter(new LoginFilter($this->getServiceLocator()));
// 			$form->setInputFilter($filter);
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
	public function logoutAction()
	{
		$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
	
	
	
		if ($auth->hasIdentity()) {
			
			$identity = $auth->getIdentity();
			
		}
		$auth->clearIdentity();
		
		return $this->redirect()->toRoute(NULL, array('controller' => 'Authentification', 'action' => 'login'));
	
	}
	
	// the use of controller plugin
	public function authTestAction()
	{
		if ($user = $this->identity()) { // controller plugin
			// someone is logged !
		} else {
			// not logged in
		}
	}
	public function forgottenPasswordAction()
	{
		$form = new ForgottenPasswordForm();
		$form->get('submit')->setValue('Send');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new ForgottenPasswordFilter($this->getServiceLocator()));
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$usrEmail = $data['usrEmail'];
				$entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
				$agent = $entityManager->getRepository('Parc\Entity\Agent')->findOneBy(array('email' => $usrEmail)); //
				$password = $this->generatePassword();
				$passwordHash = $this->encriptPassword($this->getStaticSalt(), $password, $agent->getUsrPasswordSalt());
				$this->sendPasswordByEmail($usrEmail, $password);
				$this->flashMessenger()->addMessage($usrEmail);
				$agent->setPassword($passwordHash);
				$entityManager->persist($agent);
				$entityManager->flush();
				return $this->redirect()->toRoute(NULL, array('controller'=>'Authentification', 'action'=>'password-change-success'));
			}
		}
		return new ViewModel(array('form' => $form));
	}

	public function getStaticSalt()
	{
		$staticSalt = '';
		$config = $this->getServiceLocator()->get('Config');
		$staticSalt = $config['static_salt'];
		return $staticSalt;
	}
	public function encriptPassword($staticSalt, $password, $dynamicSalt)
	{
		return $password = md5($staticSalt . $password . $dynamicSalt);
	}
	public function passwordChangeSuccessAction()
	{
	$usr_email = null;
	$flashMessenger = $this->flashMessenger();
	if ($flashMessenger->hasMessages()) {
	foreach($flashMessenger->getMessages() as $key => $value) {
	$usr_email .=  $value;
	}
	}
	return new ViewModel(array('usr_email' => $usr_email));
	}
	
	public function sendPasswordByEmail($usr_email, $password)
	{
		$transport = $this->getServiceLocator()->get('mail.transport');
		$message = new Message();
		$this->getRequest()->getServer();  //Server vars
		$message->addTo($usr_email)
		->addFrom('praktiki@coolcsn.com')
		->setSubject('Your password has been changed!')
		->setBody("Your password at  " .
				$this->getRequest()->getServer('HTTP_ORIGIN') .
				' has been changed. Your new password is: ' .
				$password
		);
		$transport->send($message);
	}
	public function generatePassword($l = 8, $c = 0, $n = 0, $s = 0) {
		// get count of all required minimum special chars
		$count = $c + $n + $s;
		$out = '';
		// sanitize inputs; should be self-explanatory
		if(!is_int($l) || !is_int($c) || !is_int($n) || !is_int($s)) {
			trigger_error('Argument(s) not an integer', E_USER_WARNING);
			return false;
		}
		elseif($l < 0 || $l > 20 || $c < 0 || $n < 0 || $s < 0) {
			trigger_error('Argument(s) out of range', E_USER_WARNING);
			return false;
		}
		elseif($c > $l) {
			trigger_error('Number of password capitals required exceeds password length', E_USER_WARNING);
			return false;
		}
		elseif($n > $l) {
			trigger_error('Number of password numerals exceeds password length', E_USER_WARNING);
			return false;
		}
		elseif($s > $l) {
			trigger_error('Number of password capitals exceeds password length', E_USER_WARNING);
			return false;
		}
		elseif($count > $l) {
			trigger_error('Number of password special characters exceeds specified password length', E_USER_WARNING);
			return false;
		}
	
		// all inputs clean, proceed to build password
	
		// change these strings if you want to include or exclude possible password characters
		$chars = "abcdefghijklmnopqrstuvwxyz";
		$caps = strtoupper($chars);
		$nums = "0123456789";
		$syms = "!@#$%^&*()-+?";
	
		// build the base password of all lower-case letters
		for($i = 0; $i < $l; $i++) {
			$out .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
		}
	
		// create arrays if special character(s) required
		if($count) {
			// split base password to array; create special chars array
			$tmp1 = str_split($out);
			$tmp2 = array();
	
			// add required special character(s) to second array
			for($i = 0; $i < $c; $i++) {
				array_push($tmp2, substr($caps, mt_rand(0, strlen($caps) - 1), 1));
			}
			for($i = 0; $i < $n; $i++) {
				array_push($tmp2, substr($nums, mt_rand(0, strlen($nums) - 1), 1));
			}
			for($i = 0; $i < $s; $i++) {
				array_push($tmp2, substr($syms, mt_rand(0, strlen($syms) - 1), 1));
			}
	
			// hack off a chunk of the base password array that's as big as the special chars array
			$tmp1 = array_slice($tmp1, 0, $l - $count);
			// merge special character(s) array with base password array
			$tmp1 = array_merge($tmp1, $tmp2);
			// mix the characters up
			shuffle($tmp1);
			// convert to string for output
			$out = implode('', $tmp1);
		}
	
		return $out;
	}
	
	public function getUsersTable()
	{
		if (!$this->usersTable) {
			$sm = $this->getServiceLocator();
			$this->usersTable = $sm->get('Auth\Model\UsersTable');
		}
		return $this->usersTable;
	}
	
	protected $em;
	
	public function getEntityManager()
	{
		if (null === $this->em) {
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}
		return $this->em;
	}
	}
