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
use Clients\Entity;
use Clients\Form\ClientForm;
use Zend\InputFilter\InputFilter;
use Clients\Entity\Entrepris;
use Clients\Entity\Client;
use Clients\Entity\Fiabilite;
use Clients\Form\FiabiliteForm;
use Doctrine\Tests\Common\Annotations\Null;
class UnclientController extends AbstractActionController
{
    public function indexAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	
    	
    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
//     	 $clients = $em->getRepository('Clients\Entity\Client')->findBy(array(), array('nom' => 'ASC'));
		$querybuilder=$em->getRepository('Clients\Entity\Client')->createQueryBuilder('c');
		$query=$querybuilder->getQuery();
		$clients=$query->getResult();
		
    	return new ViewModel(array('clients' => $clients));
    }
    
    public function afficherAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$id = (int) $this->params()->fromRoute('id');
    	$form=new ClientForm();
    	$objectManager=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$client=$objectManager->find('Clients\Entity\Client',$id);
    	$data=Array();
    	$data=$client->getArrayCopy();
    	 
    	if($data['type']==1)
    	{
    		$entr=new Entrepris();
    		$entr=$objectManager->find('Clients\Entity\Entrepris', $client->getEntNom());
    		$data['Raison_social']=$entr->getRaisonsocial();
    		$data['rc']=$entr->getRc();
    		$data['inter_fin']=$entr->getInterFin();
    	}
    	else
    	{
    		$data['Raison_social']=NULL;
    		$data['rc']=NULL;
    		$data['inter_fin']=NULL;
    	}
    	$form->remplire($data);
    	$viewModel = new ViewModel(array('form'=>$form,'id' => $id, 'type'=>$data['type']));
    	return $viewModel;
    }
	
    public function ajouterAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$form = new ClientForm();
    	$pos= array();
    	if ($this->request->isPost()) {
    		$post = $this->request->getPost();
    		$inputFilter = new InputFilter();
    		$form->setInputFilter($inputFilter);
    		$form->setData($post);
    		if ($form->isValid()) {
    			$pos=$this->request->getPost();
    			
	   			$entrepris=new Entrepris();
	   			$client=new Client();
	   			$fiabilite=new Fiabilite();
	   		
    			$entrepris->create($form->getData());
 				$client->create($form->getData());
 				$fiabilite->create($client,'Fiable','Nouveau client');
    			$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
   				$objectManager->persist($client);
   				$objectManager->persist($entrepris);
   				$objectManager->persist($fiabilite);
	   			$objectManager->flush();
	   			$id=$client->getIdclient();

    			$viewModel = new ViewModel(array('form' =>$form,'donne'=>$fiabilite));
    			return $viewModel;
    		}
    	}
    	$viewModel = new ViewModel(array('form' =>$form, 'donne'=>gettype($pos)));
    	return $viewModel;
    }
    
    public function fiabiliteAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$id = (int) $this->params()->fromRoute('id');
    	$objectManager=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$client=$objectManager->find('Clients\Entity\Client',$id);
    	$form=new FiabiliteForm();
    	if($this->request->isPost())
    	{
    		$post = $this->request->getPost();
    		$inputFilter = new InputFilter();
    		$form->setInputFilter($inputFilter);
    		$form->setData($post);
    		if ($form->isValid())
    		{
    			$post=$form->getData();
    			$post['statut']=($post['statut']) ? 'Non Fiable' : 'Fiable';
    			$fiabilite=new Fiabilite();
    			$fiabilite->create($client,$post['statut'],$post['remarque']);
    			$objectManager->persist($fiabilite);
    			$client->setStatus($post['statut']);
    			$objectManager->persist($client);
    			$objectManager->flush();
    			
    		return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Unclient','action' => 'index'));
    		
    		}
    		
    		
    	}
    	
    	$viewModel = new ViewModel(array('form' =>$form,'id'=>$id));
    	return $viewModel;
    	
    }
    
    public function modifierAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$id = (int) $this->params()->fromRoute('id');
    	$form=new ClientForm();
    	$objectManager=$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	$client=$objectManager->find('Clients\Entity\Client',$id);
    	if($this->request->isPost()) 
    	{
    		$post = $this->request->getPost();
    		$inputFilter = new InputFilter();
    		$form->setInputFilter($inputFilter);
    		$form->setData($post);
    		if ($form->isValid()) 
    			{
    				$post=$form->getData();
    				$client->create($post);
    				$entreprise=$objectManager->find('Clients\Entity\Entrepris',$post['Entreprise']);
    				$entreprise->create($post);
    				$objectManager->flush();
    			}
	    		$viewModel = new ViewModel(array('test' => $post,'form'=>$form,'id' => $id));
	    		return $viewModel;
    		
    	}
    	else 
    	{
    	
    	$data=Array();
    	$data=$client->getArrayCopy();
    	
		    	if($data['type']==1)
		    	{
		    		$entr=new Entrepris();
		    		$entr=$objectManager->find('Clients\Entity\Entrepris', $client->getEntNom());
		    		$data['Raison_social']=$entr->getRaisonsocial();
		    		$data['rc']=$entr->getRc();
		    		$data['inter_fin']=$entr->getInterFin();
		    	}
		    	else 
		    	{
		    		$data['Raison_social']=NULL;
		    		$data['rc']=NULL;
		    		$data['inter_fin']=NULL;
    			}
    	$form->remplire($data);
    	
    	$viewModel = new ViewModel(array('test' => $data,'form'=>$form, 'id' => $id));
    	return $viewModel;
    	}
    }
    
    public function supprimerAction()
    {
    	$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
    	if (!$auth->hasIdentity()) return $this->redirect()->toRoute('authentification/default', array('controller' => 'Authentification', 'action' => 'login'));
    	 
    	$id = (int) $this->params()->fromRoute('id', 0);
    	if ($id) {
    		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    		$user = $objectManager->find('Clients\Entity\Client',$id);
    		$objectManager->remove($user);
    		$objectManager->flush();
    		$this->flashMessenger()->addSuccessMessage('Client Supprim�');
    	}
    	return $this->redirect()->toRoute(NULL ,array( 'controller' => 'Unclient','action' => 'index'));
    }
    
    
}
