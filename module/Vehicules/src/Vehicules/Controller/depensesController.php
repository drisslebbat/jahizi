<?php
namespace Vehicules\Controller;
use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel,
 Vehicules\Form\ReparationForm,
 Vehicules\Entity\Reparation,
 Vehicules\Entity\Visitetechnique,
 Vehicules\Form\VisitForm,
 Vehicules\Form\VidangeForm,
 Vehicules\Entity\Vidange,
 Vehicules\Form\VignetteForm,
 Vehicules\Entity\Vignette,
 Vehicules\Entity\Piececonsommable,
 Vehicules\Form\pieceForm,
 Vehicules\Form\CarburantForm,
 Vehicules\Entity\Carburant,
 Vehicules\Entity\Assurance,
 Vehicules\Form\AssuranceForm,
 Vehicules\Entity\Autorisation,
 Vehicules\Form\AutorisationForm,
 Vehicules\Form\IncidentForm,
 Vehicules\Entity\Incident;
class depensesController extends AbstractActionController
{
  protected $_objectManager;
  protected function getObjectManager()
   {
	if (!$this->_objectManager) {
		$this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
	}

	return $this->_objectManager;
} 
public function addRepAction()
{    $idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    $_objectManager=$this->getObjectManager();
    $form = new ReparationForm($_objectManager);
    $request = $this->getRequest();
    $post = $this->request->getPost();
    if ($this->request->isPost()) {
    	$Reparation= new Reparation();
    	$form->setData($post);
    	if ($form->isValid()) {
    		$f=$form->getData();
    		$Reparation->populate($f,$vehicule);
    		$objectManager = $this->getObjectManager();
    		$objectManager->persist($Reparation);
    		$objectManager->flush();
    		$id=$Reparation->getIdrep();
    		var_dump($id);
    		return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerrep'));
    		}
    		}
    		$viewModel = new ViewModel(array('form' =>$form,'id'=>$idv));
    		return $viewModel;}
    		
    		
    		public function listerRepAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    				if (!$id) {
			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
		}
		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Reparation')->findByIdveh($id);
    	return new ViewModel(array('rep' => $rep));
    		}  		
    		
    		public function editRepAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Reparation')->find($id);
    			$v=$a->getIdveh();
    			$form = new ReparationForm();
    			$form->setBindOnValidate(false);
    				
    			$form->bind($a);
    			$form->get('daterep')->setValue($a->getDaterep()->format('d-m-Y'));
    			$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    			
    			$request = $this->getRequest();
    			
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    	                        $f = $this->request->getPost();
    							$a->populate($f,$v);
    							$this->getObjectManager()->flush();
    							// Redirect to list of vehicules
    							return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerrep'));}}
    			return array(
    					'id' => $id,
    					'form' => $form,);}
    			
    			
    			public function deleterepAction()
    			{
    				$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    				if (!$id) {
    					return $this->redirect()->toRoute('vehicules');
    				}
    			
    				$u = $this->getObjectManager()->find('Vehicules\Entity\Reparation', $id);
    				$this->getObjectManager()->remove($u);
    				$this->getObjectManager()->flush();
    				$this->flashMessenger()->addSuccessMessage('Reparation Supprimé');
    			
    				// Redirect to list of albums
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerrep'));
    			}
    		
    			
    			
    			
    			
    		
    		
    		
    		
    		public function addVisitAction()
    		{   $idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$_objectManager=$this->getObjectManager();
    		$form = new VisitForm();
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Visitetechnique= new Visitetechnique();
    			$form->setData($post);
    			if ($form->isValid()) {
    				$f=$form->getData();
    				$Visitetechnique->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Visitetechnique);
    				$objectManager->flush();
    				$id=$Visitetechnique->getIdvisite();
    				var_dump($id);
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    			}
    		}
    		$viewModel = new ViewModel(array('form' =>$form,'id' => $idv));
    		return $viewModel;}
    		
    		
    		
    		
    		
    		public function listerVisitAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    		if (!$id) {
    			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    		}
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Visitetechnique')->findByIdveh($id);
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editVisitAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Visitetechnique')->find($id);
    			$v=$a->getIdveh();
    			$form = new VisitForm();
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('datevisite')->setValue($a->getDatevisite()->format('d-m-Y'));
    			$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    			 
    			$request = $this->getRequest();
    			 
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f,$v);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listervisit'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    					 
    					 
    					public function deleteVisitAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    						 
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Visitetechnique', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('Visitetechnique Supprimé');
    						 
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listervisit'));
    					}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function addVidAction()
    		{  
    			$idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$_objectManager=$this->getObjectManager();
    		$form = new VidangeForm($_objectManager);
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Vidange= new Vidange();
    			$form->setData($post);
    			if ($form->isValid()) {
    				$f=$form->getData();
    				$Vidange->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Vidange);
    				$objectManager->flush();
    				$id=$Vidange->getIdvidange();
    				var_dump($id);
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    				
    			}
    		}
    		$viewModel = new ViewModel(array('form' =>$form,'id'=>$idv));
    		return $viewModel;}
    		
    		
    		
    		
    		
    		
    		public function listerVidAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    		if (!$id) {
    			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    		}
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Vidange')->findByIdveh($id);
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editVidAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Vidange')->find($id);
    			$v=$a->getIdveh();
    			$form = new VidangeForm();
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('datevidange')->setValue($a->getDatevidange()->format('d-m-Y'));
    			$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    			 
    			$request = $this->getRequest();
    			 
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f,$v);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    					 
    					 
    					public function deleteVidAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    						 
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Vidange', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('Vidange Supprimé');
    						 
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listervid'));
    					}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function addVignAction()
    		{ 
    			$idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			var_dump($vehicule->getIdveh());
    			$_objectManager=$this->getObjectManager();
    		$form = new VignetteForm();
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Vignette= new Vignette();
    			$form->setData($post);
    			if ($form->isValid()) {
    				$f=$form->getData();
    				$Vignette->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Vignette);
    				$objectManager->flush();
    				$id=$Vignette->getIdvign();
    				var_dump($id);
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    			}
    		}
    		$viewModel = new ViewModel(array('form' =>$form,'id' => $idv));
    		return $viewModel;}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function listerVignAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    		if (!$id) {
    			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    		}
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Vignette')->findByIdveh($id);
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editVignAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Vignette')->find($id);
    			$v=$a->getIdveh();
    			$form = new vignetteForm();
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    		
    			$request = $this->getRequest();
    		
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f,$v);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		
    		
    					public function deleteVignAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Vignette', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('Vignette Supprimé');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerVign'));
    					}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function addPieceAction(){ 
    		    $idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			 
    			$_objectManager=$this->getObjectManager();
    			$form = new pieceForm();
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Piececonsommable= new Piececonsommable();
    			$form->setData($post);
    			if ($form->isValid()) {
    				$f=$form->getData();
    				$Piececonsommable->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Piececonsommable);
    				$objectManager->flush();
    				$id=$Piececonsommable->getIdpiece();
    				var_dump($id);
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form,'id' => $idv));
    			return $viewModel;
    		}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function listerPieceAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    		if (!$id) {
    			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    		}
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Piececonsommable')->findByIdveh($id);
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editPieceAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Vidange')->find($id);
    			$v=$a->getIdveh();
    			$form = new PieceForm();
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    		
    			$request = $this->getRequest();
    		
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f,$v);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		
    		
    					public function deletePieceAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Vidange', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('Vidange Supprimé');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerPiece'));
    					}
    		
    		
    		
    					
    					
    					
    					
    					
    		
    		
    		public function addCarbAction()
    		{   $idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			
    			$_objectManager=$this->getObjectManager();
    			$form = new CarburantForm();
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Carburant= new Carburant();
    			$form->setData($post);
    			if ($form->isValid()) {
    				$f=$form->getData();
    				$Carburant->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Carburant);
    				$objectManager->flush();
    				$id=$Carburant->getIdcarb();
    				var_dump($id);
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form,'id' => $idv));
    			return $viewModel;}
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			public function listerCarbAction()
    			{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Carburant')->findByIdveh($id);
    			return new ViewModel(array('rep' => $rep));
    			}
    			
    			public function editCarbAction()
    			{
    				$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    				if (!$id) {
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    				}
    				$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Carburant')->find($id);
    				$v=$a->getIdveh();
    				$form = new VidangeForm();
    				$form->setBindOnValidate(false);
    			
    				$form->bind($a);
    				$form->get('datevidange')->setValue($a->getDatevidange()->format('d-m-Y'));
    				$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    				$form->get('submit')->setAttribute('value', 'Modifier');
    			
    				$request = $this->getRequest();
    			
    				if ($request->isPost()) {
    					$form->setData($request->getPost());
    					if ($form->isValid()) {
    						$f = $this->request->getPost();
    						$a->populate($f,$v);
    						$this->getObjectManager()->flush();
    						// Redirect to list of vehicules
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
    						return array(
    								'id' => $id,
    								'form' => $form,);}
    			
    			
    						public function deleteCarbAction()
    						{
    							$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    							if (!$id) {
    								return $this->redirect()->toRoute('vehicules');
    							}
    								
    							$u = $this->getObjectManager()->find('Vehicules\Entity\Carburant', $id);
    							$this->getObjectManager()->remove($u);
    							$this->getObjectManager()->flush();
    							$this->flashMessenger()->addSuccessMessage('Carburant Supprimé');
    								
    							// Redirect to list of albums
    							return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerCarb'));
    						}
    			
    			
    			
    			
    			
    			
    			
    		
    		public function addAssAction(){
    			$form = new assuranceForm();
    			$idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$viewModel = new ViewModel(array('form' =>
    					$form, 'id' => $idv));
    			return $viewModel;
    		}
    		public function processAssAction(){   
    			$idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$_objectManager=$this->getObjectManager();
    		$form = new AssuranceForm();
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Assurance= new Assurance();
    			$form->setData($post);
    			if ($form->isValid()) {
    				$f=$form->getData();
    			    $Assurance->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Assurance);
    				$objectManager->flush();
    				$id=$Assurance->getIdasc();
    				$viewModel = new ViewModel(array('form' =>$form));
    				return $viewModel;
    				//return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv ));
    				
    			}
    		}
    		$viewModel = new ViewModel(array('form' =>$form));
    		return $viewModel;}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function listerAssAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    		if (!$id) {
    			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    		}
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Assurance')->findByIdveh($id);
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editAssAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Assurance')->find($id);
    			$v=$a->getIdveh();
    			$form = new AssuranceForm();
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);  
    			$form->get('datedebut')->setValue($a->getDatedebut()->format('d-m-Y'));
    			$form->get('datepaiement')->setValue($a->getDatepaiement()->format('d-m-Y'));
    			$form->get('dateexp')->setValue($a->getDateexp()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    		
    			$request = $this->getRequest();
    		
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f,$v);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		
    		
    					public function deleteAssAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Assurance', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('Assurance Supprimé');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerass'));
    					}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function addAutoAction()
    		{
    			$idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			
    			$_objectManager=$this->getObjectManager();
    			$form = new AutorisationForm();
    			$request = $this->getRequest();
    			$post = $this->request->getPost();
    			if ($this->request->isPost()) {
    				$Autorisation= new Autorisation();
    				$form->setData($post);
    				if ($form->isValid()) {
    					$f=$form->getData();
    					$Autorisation->populate($f,$vehicule);
    					$objectManager = $this->getObjectManager();
    					$objectManager->persist($Autorisation);
    					$objectManager->flush();
    					$id=$Autorisation->getIdaut();
    					var_dump($id);
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    			
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form,'id' => $idv));
    			return $viewModel;
    		}
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		public function listerAutoAction()
    		{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    		if (!$id) {
    			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    		}
    		$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Autorisation')->findByIdveh($id);
    		return new ViewModel(array('rep' => $rep));
    		}
    		
    		public function editAutoAction()
    		{
    			$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			if (!$id) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Autorisation')->find($id);
    			$v=$a->getIdveh();
    			$form = new autorisationForm();
    			$form->setBindOnValidate(false);
    		
    			$form->bind($a);
    			$form->get('datedebut')->setValue($a->getDatedebut()->format('d-m-Y'));
    			$form->get('datedebut')->setValue($a->getDatedebut()->format('d-m-Y'));
    			$form->get('dateexp')->setValue($a->getDateexp()->format('d-m-Y'));
    			$form->get('submit')->setAttribute('value', 'Modifier');
    		
    			$request = $this->getRequest();
    		
    			if ($request->isPost()) {
    				$form->setData($request->getPost());
    				if ($form->isValid()) {
    					$f = $this->request->getPost();
    					$a->populate($f,$v);
    					$this->getObjectManager()->flush();
    					// Redirect to list of vehicules
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
    					return array(
    							'id' => $id,
    							'form' => $form,);}
    		
    		
    					public function deleteAutoAction()
    					{
    						$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
    						if (!$id) {
    							return $this->redirect()->toRoute('vehicules');
    						}
    							
    						$u = $this->getObjectManager()->find('Vehicules\Entity\Autorisation', $id);
    						$this->getObjectManager()->remove($u);
    						$this->getObjectManager()->flush();
    						$this->flashMessenger()->addSuccessMessage('Autorisation Supprimée');
    							
    						// Redirect to list of albums
    						return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerAuto'));
    					}
    		
    		public function addIncAction()
    		{  
    			$idv = (int) $this->getEvent()->getRouteMatch()->getParam('id');
    			$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $idv);
    			var_dump($vehicule->getIdveh());
    			if (!$idv) {
    				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
    			}
    			 
    			$_objectManager=$this->getObjectManager();
    			$form = new IncidentForm();
    		$request = $this->getRequest();
    		$post = $this->request->getPost();
    		if ($this->request->isPost()) {
    			$Incident= new Incident();
    			$form->setData($post);
    				if ($form->isValid()) {
    				$f=$form->getData();
    				$Incident->populate($f,$vehicule);
    				$objectManager = $this->getObjectManager();
    				$objectManager->persist($Incident);
    				$objectManager->flush();
    				$id=$Incident->getIdincid();
    				var_dump($id);
    					return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'ind','id'=>$idv));
    					 
    				}
    			}
    			$viewModel = new ViewModel(array('form' =>$form,'id' => $idv));
    			return $viewModel;
}











public function listerIncAction()
{   $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
if (!$id) {
	return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
}
$rep =  $this->getObjectManager()->getRepository('Vehicules\Entity\Incident')->findByIdveh($id);
return new ViewModel(array('rep' => $rep));
}

public function editIncAction()
{
	$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
	if (!$id) {
		return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
	}
	$a = $this->getObjectManager()->getRepository('Vehicules\Entity\Incident')->find($id);
	$v=$a->getIdveh();
	$form = new incidentForm();
	$form->setBindOnValidate(false);

	$form->bind($a);
	$form->get('dateincident')->setValue($a->getDateincident()->format('d-m-Y'));
	$form->get('submit')->setAttribute('value', 'Modifier');

	$request = $this->getRequest();

	if ($request->isPost()) {
		$form->setData($request->getPost());
		if ($form->isValid()) {
			$f = $this->request->getPost();
			$a->populate($f,$v);
			$this->getObjectManager()->flush();
			// Redirect to list of vehicules
			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));}}
			return array(
					'id' => $id,
					'form' => $form,);}


			public function deleteIncAction()
			{
				$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
				if (!$id) {
					return $this->redirect()->toRoute('vehicules');
				}
					
				$u = $this->getObjectManager()->find('Vehicules\Entity\Incident', $id);
				$this->getObjectManager()->remove($u);
				$this->getObjectManager()->flush();
				$this->flashMessenger()->addSuccessMessage('Incident Supprimé');
					
				// Redirect to list of albums
				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'depenses','action'=>'listerInc'));
			}
}