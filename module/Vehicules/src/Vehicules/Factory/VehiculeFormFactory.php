<?php
namespace Vehicules\Factory\Form;

use Vehicules\Entity;
use Vehicules\Form;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class VehiculeFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $objectManager = $sl->get('Doctrine\ORM\EntityManager');

        $form = new Form\VehiculeForm($objectManager);
        $vehicule = new Entity\Vehicule();

        // create the hydrator; this could also be done via the
        // hydrator manager but create here for the example
        $hydrator = new DoctrineObject($objectManager);

        $form->setHydrator($hydrator);
        $form->setObject($vehicule);

        // We can also take care of the input filter here too!
        // meaning less code in the controller and only
        // one place to modify should it change
        $form->setInputFilter($vehicule->getInputFilter());

        return $form;
    }
}