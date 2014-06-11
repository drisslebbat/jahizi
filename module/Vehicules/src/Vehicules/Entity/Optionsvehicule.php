<?php

namespace Vehicules\Entity;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optionsvehicule
 *
 * @ORM\Table(name="optionsvehicule", uniqueConstraints={@ORM\UniqueConstraint(name="OPTIONSVEHICULE_PK", columns={"idOptVeh"})})
 * @ORM\Entity
 */
class Optionsvehicule
{    protected  $inputFilter;
    /**
     * @var integer
     *
     * @ORM\Column(name="idOptVeh", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoptveh;

    /**
     * @var string
     *
     * @ORM\Column(name="libellee", type="string", length=255, nullable=true)
     */
    private $libellee;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="text", nullable=true)
     */
    private $remarques;
    

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vehicules\Entity\Vehicule", mappedBy="idoptveh")
     */
    private $idveh;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idveh = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idoptveh
     *
     * @return integer 
     */
    public function getIdoptveh()
    {
        return $this->idoptveh;
    }

    /**
     * Set libellee
     *
     * @param string $libellee
     * @return Optionsvehicule
     */
    public function setLibellee($libellee)
    {
        $this->libellee = $libellee;

        return $this;
    }
   

    /**
     * Get libellee
     *
     * @return string 
     */
    public function getLibellee()
    {
        return $this->libellee;
    }

    /**
     * Set remarques
     *
     * @param string $remarques
     * @return Optionsvehicule
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;

        return $this;
    }

    /**
     * Get remarques
     *
     * @return string 
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * Add idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Optionsvehicule
     */
    public function addIdveh(\Vehicules\Entity\Vehicule $idveh)
    {
        $this->idveh[] = $idveh;

        return $this;
    }

    /**
     * Remove idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     */
    public function removeIdveh(\Vehicules\Entity\Vehicule $idveh)
    {
        $this->idveh->removeElement($idveh);
    }

    /**
     * Get idveh
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdveh()
    {
        return $this->idveh;
    }
    public function populate($data) {
    	$this->setLibellee($data['libellee']) ;
    	$this->setRemarques($data['remarques']);
    	 
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
    	throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
    	if (!$this->inputFilter) {
    		$inputFilter = new InputFilter();
    		$factory = new InputFactory();
    		$inputFilter->add($factory->createInput(array(
    				'name' => 'libellee',
    				'required' => true,
    				'filters' => array(
    						array('name' => 'StripTags'),
    						array('name' => 'StringTrim'),
    				),
    				'validators' => array(
    						array(
    								'name' => 'StringLength',
    								'options' => array(
    										'encoding' => 'UTF-8',
    										'min' => 1,
    										'max' => 14,
    								),
    						),
    			),
    		)));
    		$this->inputFilter = $inputFilter;
    	}
    
    	return $this->inputFilter;
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
