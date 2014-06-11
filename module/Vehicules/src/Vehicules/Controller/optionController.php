<?php
namespace Vehicules\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Vehicules\Form\optionForm;
use Vehicules\Entity\Optionsvehicule;

class optionController extends AbstractActionController
{
protected $_objectManager;
protected function getObjectManager()
{
	if (!$this->_objectManager) {
		$this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
	}

	return $this->_objectManager;
}
public function indexAction()
{
	
$form = new optionForm();
$viewModel = new ViewModel(array('form' =>
$form ));
return $viewModel;
}
public function processAction(){
	if (!$this->request->isPost()) {

		return $this->redirect()->toRoute(NULL ,
				array( 'controller' => 'option',
						'action' => 'index'
				));}
	             $post = $this->request->getPost();
	             $form = new optionForm();
	             $Optionsvehicule= new Optionsvehicule();
	             $form->setData($post);
	             $form->setInputFilter($Optionsvehicule->getInputFilter());
                 if ($form->isValid()) {
 				$Optionsvehicule->populate($post);
    			$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
   			    $objectManager->persist($Optionsvehicule);
	   			$objectManager->flush();
	   			$id=$Optionsvehicule->getIdoptveh();
	   			var_dump($id);
    			$viewModel = new ViewModel(array('form' =>$form,'donne'=>$id));
    			return $viewModel;
    			
    		    }
       		    $viewModel = new ViewModel(array('form' =>$form, 'donne'=>gettype($post)));
    		    return array('form' => $form);  }
   
     public function indAction()
     {
     			$options = $this->getObjectManager()->getRepository('Vehicules\Entity\Optionsvehicule')->findAll();
     			return new ViewModel(array('options' => $options));
     }
     public function editAction()
     {  
     	$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
     	if (!$id) {
     		return $this->redirect()->toRoute('vehicules/default', array('controller'=>'option','action'=>'index'));
     	}
     	$a = $this->getObjectManager()->find('Vehicules\Entity\Optionsvehicule', $id);
     	$form = new optionForm();
     	$form->setBindOnValidate(false);
     	$form->bind($a);
     	$form->get('submit')->setAttribute('value', 'Modifier');
     	$request = $this->getRequest();
     	if ($request->isPost()) {
     		$form->setData($request->getPost());
     		if ($form->isValid()) {
     			$form->bindValues();
     			$this->getObjectManager()->flush();
     			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'option','action'=>'ind'));
     		}
     	}
     
     	return array(
     			'id' => $id,
     			'form' => $form,
     	);
     	
     }
     
     public function deleteAction()
     {
      	$id = (int) $this->params('id', null);
     	if (null == $id) {
     		return $this->redirect()->toRoute('vehicules/default', array('controller'=>'option','action'=>'index'));
     	}       
     	    $u = $this->getObjectManager()->find('Vehicules\Entity\Optionsvehicule', $id);
     		$this->getObjectManager()->remove($u);
     		$this->getObjectManager()->flush();
     		$this->flashMessenger()->addSuccessMessage('Option Supprimé');
     		return $this->redirect()->toRoute('vehicules/default', array('controller'=>'option','action'=>'ind'));
    
     }
   
}