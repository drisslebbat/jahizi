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
	}	
	

	public function activeAction()
	{
		
	}
	public function afficherAction()
	{
		
	}
	public function supprimerAction() 
	{
		
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