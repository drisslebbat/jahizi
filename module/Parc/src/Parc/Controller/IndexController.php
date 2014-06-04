<?php
namespace Parc\Controller;

// Authentication with Remember Me
// http://samsonasik.wordpress.com/2012/10/23/zend-framework-2-create-login-authentication-using-authenticationservice-with-rememberme/

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Parc\Entity\Agent; // only for the filters
use Parc\Form\AgentForm;       // <-- Add this import
use Parc\Form\AgentFilter;
use Parc\Entity\Agence;
use Autorisation\Entity\Droit;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$em = $this->getEntityManager();
		$agents = $em->getRepository('Parc\Entity\Agent')->findAll();
// 		foreach ($agents as $agent){
// 		$this->initialiseDroits($agent);
// 		}
//         return new ViewModel(array(
// 			'agents'	=> $agents,
// 		));
        
    }
	
    public function modifierAction()
    {
    	$id = $this->params()->fromRoute('id');
    	if (!$id) return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Index', 'action' => 'index'));
    	$objectManager=$this->getEntityManager();
    	$agent=$objectManager->find('Parc\Entity\Agent',$id);
    	$form = new AgentForm();
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setInputFilter(new AgentFilter());
    		$form->setData($request->getPost());
    		if ($form->isValid()) {
    			$data = $form->getData();
    			$agent->create($data);
    			$objectManager->persist($agent);
    			$objectManager->flush();
    			return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Index', 'action' => 'index'));
    		}
    	}
    	else {
    		$form->remplire($agent->getArrayCopy());
    	
    	return new ViewModel(array('form' => $form, 'id' => $id));
    }
    }
	
	public function ajouterAction()
	{
		$form = new AgentForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new AgentFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				$agent=new Agent();
				$agent->create($this->prepareData($data));
				$objectManager=$this->getEntityManager();
				$objectManager->persist($agent);
				$objectManager->flush();
				
				return $this->redirect()->toRoute(NULL, array('controller' => 'Index', 'action' => 'index'));
			}
		}
		return new ViewModel(array('form' => $form));
	}	
	

	public function activeAction()
	{

		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager=$this->getEntityManager();
			$agent=new Agent();
			$agent=$objectManager->getRepository('Parc\Entity\Agent')->find($id);
			if($agent->active())
			{
				$agent->setActive(false);
				return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Index','action' => 'index'));
				
			}
			else
			{
				$agent->setActive(true);
				return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Index','action' => 'index'));
			}
			return new ViewModel(array(
					'agent'	=> $agent,
			));
				
		}
	}
	public function afficherAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager=$this->getEntityManager();
			$agent=$objectManager->getRepository('Parc\Entity\Agent')->find($id);
			return new ViewModel(array(
					'agent'	=> $agent,
			));
			
		}
	}
	public function supprimerAction() 
	{

		$id = (int) $this->params()->fromRoute('id', 0);
		if ($id) {
			$objectManager = $this->getEntityManager();
			$agent = $objectManager->getRepository('Parc\Entity\Agent')->find($id);
			$objectManager->remove($agent);
			$objectManager->flush();
			$this->flashMessenger()->addSuccessMessage('Agent Supprimé');
		}
		return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Index','action' => 'index'));
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
	
	public function prepareData($data)
	{
		$var=$data['usr_password'];
		$salt=$this->generateDynamicSalt();
		$pass=$this->encriptPassword($this->getStaticSalt(),$var,$salt);
		$data['usr_password']=$pass;
		$data['usrPasswordSalt']=$salt;
		$data['usr_active']=true;
		return $data;
	}
	
	public function generateDynamicSalt()
	{
		$dynamicSalt = '';
		for ($i = 0; $i < 50; $i++) {
			$dynamicSalt .= chr(rand(33, 126));
		}
		return $dynamicSalt;
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
	public function initialiseDroits($agent){
		$em=$this->getEntityManager();
		$ressources= $em->getRepository('Autorisation\Entity\Ressource')->findAll();
		foreach ($ressources as $class){
			$ligne=new Droit();
			$ligne->initialiseDroits($agent, $class);
			$objectManager=$this->getEntityManager();
			$objectManager->persist($ligne);
			$objectManager->flush();
			
		}
		
	}
	
}