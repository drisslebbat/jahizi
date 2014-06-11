<?php
namespace Vehicules\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel,
 Vehicules\Form\modeleForm,
 Vehicules\Entity\Modele;
class modeleController extends AbstractActionController
{
	protected $_objectManager;
	protected function getObjectManager()
	{
		if (!$this->_objectManager) {
			$this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}

		return $this->_objectManager;
	}
	
public function addmodeleAction()
    		{   $_objectManager=$this->getObjectManager();
    			$form = new modeleForm($_objectManager);
    			$request = $this->getRequest();
    			$post = $this->request->getPost();
    			if ($this->request->isPost()) {
    				$modele= new modele($_objectManager);
    				$form->setData($post);
    				if ($form->isValid()) {
    					$f=$form->getData();
                        $m=$f['marque'];
    					$marque = $this->getObjectManager()->getRepository('Vehicules\Entity\marque')->find($m);
    					$modele->populate($f,$marque);
    					$objectManager = $this->getObjectManager();
    					$objectManager->persist($modele);
    					$id=$modele->getIdmod();
    					var_dump($id);
    					$objectManager->flush();
    					var_dump($id);
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'modele','action'=>'listermodele'));
    			
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form));
    			return $viewModel;
    		}
    		public function listermodeleAction()
    		{   
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\modele')->findAll();
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editmodeleAction()
    		{
    			$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\modele')->find($id);
    			$form = new modeleForm($this->getObjectManager());
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('submit')->setAttribute('value', 'Modifier');
    		
    			$request = $this->getRequest();
    		
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$m=$f['marque'];
    					$marque = $this->getObjectManager()->getRepository('Vehicules\Entity\marque')->find($m);
    					$a->populate($f,$marque);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'modele','action'=>'listermodele'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		
    		
    					public function deletemodeleAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\modele', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('modele Supprimée');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'modele','action'=>'listermodele'));
    					}}
    		