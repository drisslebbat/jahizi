<?php
namespace Parc\Controller;

// Authentication with Remember Me
// http://samsonasik.wordpress.com/2012/10/23/zend-framework-2-create-login-authentication-using-authenticationservice-with-rememberme/

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

// use Auth\Model\Auth;          we don't need the model here we will use Doctrine em 
use Parc\Entity\Agent; // only for the filters
use Parc\Form\AgentForm;       // <-- Add this import
use Parc\Form\AgentFilter;
use Parc\Entity\Agence;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$em = $this->getEntityManager();
		$agents = $em->getRepository('Parc\Entity\Agent')->findAll();
        return new ViewModel(array(
			'agents'	=> $agents,
//			
		));
    }
	
    public function modifierAction()
    {
    	$id = $this->params()->fromRoute('id');
    	if (!$id) return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'Index', 'action' => 'index'));
    	$form = new AgentForm();
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setInputFilter(new AgentFilter());
    		$form->setData($request->getPost());
    		if ($form->isValid()) {
    			$data = $form->getData();
    			
    			$this->getUsersTable()->update($data, array('usr_id' => $id));
    			return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'admin', 'action' => 'index'));
    		}
    	}
    	else {
    		$form->remplire()
    	
    	return new ViewModel(array('form' => $form, 'id' => $id));
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
				$agent->create($data);
				$objectManager=$this->getEntityManager();
				$objectManager->persist($agent);
				$objectManager->flush();
				//$this->getUsersTable()->insert($data);
				return $this->redirect()->toRoute(NULL, array('controller' => 'Index', 'action' => 'index'));
			}
		}
		return new ViewModel(array('form' => $form));
	}	
	

	public function activeAction()
	{
		
	}
	public function afficherAction()
	{
		
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
}