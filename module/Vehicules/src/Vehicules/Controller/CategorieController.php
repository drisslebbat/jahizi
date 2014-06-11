<?php
namespace Vehicules\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel,
 Vehicules\Form\categorieForm,
 Vehicules\Entity\Categorie;
class categorieController extends AbstractActionController
{
	protected $_objectManager;
	protected function getObjectManager()
	{
		if (!$this->_objectManager) {
			$this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}

		return $this->_objectManager;
	}
	
public function addcatAction()
    		{   $_objectManager=$this->getObjectManager();
    			$form = new categorieForm();
    			$request = $this->getRequest();
    			$post = $this->request->getPost();
    			if ($this->request->isPost()) {
    				$categorie= new categorie();
    				$form->setData($post);
    				if ($form->isValid()) {
    					$f=$form->getData();
    					$categorie->populate($f);
    					var_dump($categorie->getIdcat());
    					$objectManager = $this->getObjectManager();
    					$objectManager->persist($categorie);
    					$id=$categorie->getIdcat();
    					var_dump($id);
    					$metadata = $objectManager->getClassMetaData(get_class($categorie));
    					$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
    					$objectManager->flush();
    					var_dump($id);
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'categorie','action'=>'listercat'));
    			
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form));
    			return $viewModel;
    		}
    		public function listercatAction()
    		{   
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\categorie')->findAll();
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editcatAction()
    		{
    			$id = (string)$this->getEvent()->getRouteMatch()->getParam('id');
    			var_dump($id);
    			echo $id ;
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\categorie')->find($id);
    			$form = new categorieForm();
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
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'categorie','action'=>'listercat'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		
    		
    					public function deletecatAction()
    					{
    						$id = (string)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Categorie', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('categorie Supprimée');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'categorie','action'=>'listercat'));
    					}}
    		