<?php

namespace Vehicules\Entity;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;
use Doctrine\ORM\Mapping as ORM;

/**
 * Autorisation
 *
 * @ORM\Table(name="autorisation", uniqueConstraints={@ORM\UniqueConstraint(name="AUTORISATION_PK", columns={"idAut"})}, indexes={@ORM\Index(name="ASSOCIATION9_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Autorisation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAut", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaut;

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer", nullable=true)
     */
    private $num;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExp", type="datetime", nullable=true)
     */
    private $dateexp;

    /**
     * @var \Vehicules\Entity\Vehicule
     *
     * @ORM\ManyToOne(targetEntity="Vehicules\Entity\Vehicule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVeh", referencedColumnName="idVeh")
     * })
     */
    private $idveh;



    /**
     * Get idaut
     *
     * @return integer 
     */
    public function getIdaut()
    {
        return $this->idaut;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return Autorisation
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Autorisation
     */
    public function setDatedebut($datedebut)
    { 
      $this->datedebut = $datedebut;
      return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set dateexp
     *
     * @param \DateTime $dateexp
     * @return Autorisation
     */
    public function setDateexp($dateexp)
    {  $this->dateexp = $dateexp;
      return $this;
    }

    /**
     * Get dateexp
     *
     * @return \DateTime 
     */
    public function getDateexp()
    {
        return $this->dateexp;
    }

    /**
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Autorisation
     */
    public function setIdveh(\Vehicules\Entity\Vehicule $idveh = null)
    {
        $this->idveh = $idveh;

        return $this;
    }

    /**
     * Get idveh
     *
     * @return \Vehicules\Entity\Vehicule 
     */
    public function getIdveh()
    {
        return $this->idveh;
    }
    public function dati($s){
    	$d2=str_replace('/','-',$s);
    	return new \DateTime($d2);
    }
 public function populate($data,$vehicule) {
 	$this->datedebut= $this->dati($data['datedebut']);
 	$this->dateexp= $this->dati($data['dateexp']);
    	$this->setNum($data['num']) ;
    	$this->setIdveh($vehicule);
    	
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
    		/*$inputFilter->add($factory->createInput(array(
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
    										'max' => 3,
    								),
    						),
    				),
    		)));*/
    
    		$this->inputFilter = $inputFilter;
    	}
    
    	return $this->inputFilter;
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
