<?php
namespace Vehicules\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel,
 Vehicules\Form\marqueForm,
 Vehicules\Entity\Marque;
class marqueController extends AbstractActionController
{
	protected $_objectManager;
	protected function getObjectManager()
	{
		if (!$this->_objectManager) {
			$this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}

		return $this->_objectManager;
	}
	
public function addmarqueAction()
    		{   $_objectManager=$this->getObjectManager();
    			$form = new marqueForm($_objectManager);
    			$request = $this->getRequest();
    			$post = $this->request->getPost();
    			if ($this->request->isPost()) {
    				$marque= new marque($_objectManager);
    				$form->setData($post);
    				if ($form->isValid()) {
    					$f=$form->getData();
    					$marque->populate($f);
    					$objectManager = $this->getObjectManager();
    					$objectManager->persist($marque);
    					$objectManager->flush();
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'marque','action'=>'listermarque'));
    			
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form));
    			return $viewModel;
    		}
    		public function listermarqueAction()
    		{   
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\marque')->findAll();
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editmarqueAction()
    		{
    			$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\marque')->find($id);
    			$form = new marqueForm($this->getObjectManager());
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('submit')->setAttribute('value', 'Modifier');
    		
    			$request = $this->getRequest();
    		
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'marque','action'=>'listermarque'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		  public function deletemarqueAction()
    					{   $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\marque', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('marque Supprimée');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'marque','action'=>'listermarque'));
    					}
}
    		