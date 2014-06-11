<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Vehicules for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * 
 */

namespace Vehicules\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Vehicules\Form\VehiculeForm;
use Vehicules\Entity\Vehicule;
use Vehicules\Entity\Vehiculestatut;
class VehiculesController extends AbstractActionController
{
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
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
        $vehicules = $this->getObjectManager()->getRepository('Vehicules\Entity\Vehicule')->findAll();
        $visit = $this->getObjectManager()->getRepository('Vehicules\Entity\visitetechnique')->findAll();
        $assurance = $this->getObjectManager()->getRepository('Vehicules\Entity\assurance')->findAll();
        $autorisation = $this->getObjectManager()->getRepository('Vehicules\Entity\autorisation')->findAll();
        $vidange = $this->getObjectManager()->getRepository('Vehicules\Entity\vidange')->findAll();
        $d=new \DateTime();
        return new ViewModel(array('vehicules' => $vehicules, 'visit' => $visit, 'assurance' => $assurance, 'autorisation' => $autorisation,'vidange'=>$vidange,'d'=>$d));
    }
    public function indAction()
    {$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
		if (!$id) {
			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'add'));
		}
		$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $id);
    	return new ViewModel(array('vehicule' => $vehicule));
    }
    
    public function addAction()
    {   $_objectManager=$this->getObjectManager();
    	$form = new VehiculeForm($_objectManager);
    	$request = $this->getRequest();
	    $post = $this->request->getPost();
	    if ($this->request->isPost()) {
	    	$Vehicule= new Vehicule();
	    	$form->setData($post);
	    	$form->setInputFilter($Vehicule->getInputFilter());
	    	if ($form->isValid()) {
	    		$f=$this->request->getPost();
	    		$categorie = $this->getObjectManager()->getRepository('Vehicules\Entity\categorie')->findOneByIdcat($f['categorie']);
	    		$modele = $this->getObjectManager()->getRepository('Vehicules\Entity\Modele')->findOneByIdmod($f['modele']);
	    		if($f['option']){
	    		foreach($f['option'] as $o){
	    		$option=$this->getObjectManager()->getRepository('Vehicules\Entity\Optionsvehicule')->findOneByIdoptveh($o);
	    		$Vehicule->addIdoptveh($option);
	    		}}
	    	    $vehiculestatut=new Vehiculestatut();
	    		$Vehicule->populate($f,$categorie,$modele);
	    		$vehiculestatut->populate($f,$Vehicule);
	            $objectManager = $this->getObjectManager();
	    		$objectManager->persist($Vehicule);
	    		$objectManager->persist($vehiculestatut);
	    		$objectManager->flush();
	    		$id=$Vehicule->getIdveh();
	    		var_dump($id);
	    		$viewModel = new ViewModel(array('form' =>$form,'donne'=>$id));
	    		return $viewModel;
	    	}
	    }
		$viewModel = new ViewModel(array('form' =>$form));
		return $viewModel;
	    
    }
    
    
	public function editAction()
	{
	
		$id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
		if (!$id) {
			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'add'));
		}
		$vehicule = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $id);
		$objectManager= $this->getObjectManager();
		$form = new VehiculeForm($objectManager);
		$form->setBindOnValidate(false);
		$form->bind($vehicule);
		$s=$vehicule->getStatus();
		/*$opts =$vehicule->getIdoptveh();
		foreach ($opts as $o){
			$form->ObjectMultiCheckbox->setCheckedValue($o->getLibellee());
		}*/
		//$form->setChecked(true);
		$form->get('datemisecirculation')->setValue($vehicule->getDatemisecirculation()->format('d-m-Y'));
		$form->get('submit')->setAttribute('value', 'Modifier');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setData($request->getPost());
			$form->setInputFilter($vehicule->getInputFilter());
			if ($form->isValid()) {
				$f = $this->request->getPost();
			    $categorie = $this->getObjectManager()->getRepository('Vehicules\Entity\categorie')->findOneByIdcat($f['categorie']);
	    		$modele = $this->getObjectManager()->getRepository('Vehicules\Entity\Modele')->findOneByIdmod($f['modele']);
	    		if($f['option']){
	    		foreach($f['option'] as $o){
	    		$option=$this->getObjectManager()->getRepository('Vehicules\Entity\Optionsvehicule')->findOneByIdoptveh($o);
	    		$vehicule->addIdoptveh($option);
	    		}} 
	    		if ($s!=$f['status']){
	    		$vehiculestatut=new Vehiculestatut();
	    		$vehiculestatut->populate($f,$vehicule);
	    		$this->getObjectManager()->persist($vehiculestatut);}
	    		$vehicule->populate($f,$categorie,$modele);
	            $this->getObjectManager()->flush(); 
				// Redirect to list of vehicules
				return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
			}
		}
	
		return array(
				'id' => $id,
				'form' => $form,
		);} 
	public function deleteAction()
	{  
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
		var_dump($id);
		if (!$id) {
			return $this->redirect()->toRoute('vehicules');
		}
	
		 $u = $this->getObjectManager()->find('Vehicules\Entity\vehicule', $id);
		 var_dump($u);
     		$this->getObjectManager()->remove($u);
     		$this->getObjectManager()->flush();
     		$this->flashMessenger()->addSuccessMessage('Vehicule Supprimé');
	
			// Redirect to list of albums
			return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'index'));
		}
	
    
    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /vehicules/vehicules/foo
        return array();
    }
    public function VehlibreAction()
    { 
    	$vehicules = $this->getObjectManager()->getRepository('Vehicules\Entity\Vehicule')->findBystatus('libre');
     //return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'VehLibre','vehicules' => $vehicules));
     return new ViewModel(array('vehicules' => $vehicules));
    }
     
    public function VehreserveAction()
    {
    	$vehicules = $this->getObjectManager()->getRepository('Vehicules\Entity\Vehicule')->findBystatus('reservée');
       //return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'VehReserve','vehicules' => $vehicules));
    return new ViewModel(array('vehicules' => $vehicules)); }
    public function VehindisponibleAction()
    {
    	$vehicules = $this->getObjectManager()->getRepository('Vehicules\Entity\Vehicule')->findBystatus('indisponible');
         //return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'VehIndisponible','vehicules' => $vehicules));
    return new ViewModel(array('vehicules' => $vehicules)); }
    public function VehhorservicAction()
    {
    $vehicules = $this->getObjectManager()->getRepository('Vehicules\Entity\Vehicule')->findBystatus('Hors service');
      //return $this->redirect()->toRoute('vehicules/default', array('controller'=>'vehicules','action'=>'VehHorservic','vehicules' => $vehicules));
    return new ViewModel(array('vehicules' => $vehicules)); }
}
