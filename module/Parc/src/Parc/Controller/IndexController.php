<?php
namespace Parc\Controller;

// Authentication with Remember Me
// http://samsonasik.wordpress.com/2012/10/23/zend-framework-2-create-login-authentication-using-authenticationservice-with-rememberme/

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

// use Auth\Model\Auth;          we don't need the model here we will use Doctrine em 
use Parc\Entity\Agent; // only for the filters
use Parc\Form\LoginForm;       // <-- Add this import
use Parc\Form\LoginFilter;

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
    }
	
	public function ajouterAction()
	{
		$form = new UserForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter(new UserFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$data = $form->getData();
				unset($data['submit']);
				if (empty($data['usr_registration_date'])) $data['usr_registration_date'] = '2013-07-19 12:00:00';
				$this->getUsersTable()->insert($data);
				return $this->redirect()->toRoute('auth-doctrine/default', array('controller' => 'admin', 'action' => 'index'));
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
			$user = $objectManager->find('Clients\Entity\Client',$id);
			$objectManager->remove($user);
			$objectManager->flush();
			$this->flashMessenger()->addSuccessMessage('Client Supprimé');
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