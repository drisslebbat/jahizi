<?php

namespace Vehicules\Entity;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule", uniqueConstraints={@ORM\UniqueConstraint(name="VEHICULE_PK", columns={"idVeh"})}, indexes={@ORM\Index(name="ASSOCIATION11_FK", columns={"idCat"}), @ORM\Index(name="ASSOCIATION13_FK", columns={"idMod"})})
 * @ORM\Entity
 */
class Vehicule 
{     protected $inputFilter;
      
    /**
     * @var integer
     *
     * @ORM\Column(name="idVeh", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idveh;
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=254, nullable=false)
     */
    private $matricule;

    /**
     * @var \Date
     *
     * @ORM\Column(name="datemisecirculation", type="date", nullable=true)
     */
    private $datemisecirculation;

    /**
     * @var string
     *
     * @ORM\Column(name="numChasis", type="string", length=254, nullable=false)
     */
    private $numchasis;

    /**
     * @var string
     *
     * @ORM\Column(name="carburant", type="string", length=254, nullable=true)
     */
    private $carburant;

    /**
     * @var integer
     *
     * @ORM\Column(name="dernierKm", type="integer", nullable=false)
     */
    private $dernierkm;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixachat", type="integer", nullable=false)
     */
    private $prixachat;

    /**
     * @var string
     *
     * @ORM\Column(name="concessionnaire", type="string", length=254, nullable=true)
     */
    private $concessionnaire;

    /**
     * @var string
     *
     * @ORM\Column(name="sousLocation", type="string", nullable=true)
     */
    private $souslocation;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=254, nullable=true)
     */
    private $remarque;
  
    /**
     * @var integer
     *
     * @ORM\Column(name="puisFiscal", type="integer", nullable=true)
     */
    private $puisfiscal;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrePort", type="integer", nullable=true)
     */
    private $nbreport;

    /**
     * @var \Vehicules\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="Vehicules\Entity\Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCat", referencedColumnName="idCat")
     * })
     */
    private $idcat;

    /**
     * @var \Vehicules\Entity\Modele
     *
     * @ORM\ManyToOne(targetEntity="Vehicules\Entity\Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMod", referencedColumnName="idMod")
     * })
     */
    private $idmod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vehicules\Entity\Optionsvehicule", inversedBy="idveh")
     * @ORM\JoinTable(name="veh_option",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idVeh", referencedColumnName="idVeh")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idOptVeh", referencedColumnName="idOptVeh")
     *   }
     * )
     */
    private $idoptveh;
    public function __construct()
    {
    	// Si vous aviez déjà un constructeur, ajoutez juste cette ligne :
    	$this->idoptveh = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
     * Get idveh
     *
     * @return integer 
     */
    public function getIdveh()
    {
        return $this->idveh;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Vehicule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set datemisecirculation
     *
     * @param \Date $datemisecirculation
     * @return Vehicule
     */
    public function setDatemisecirculation($datemisecirculation)
    {   
    	$this->datemisecirculation ;
            return $this;
    }

    /**
     * Get datemisecirculation
     *
     * @return \Date
     */
    public function getDatemisecirculation()
    {
        return $this->datemisecirculation;
    }

    /**
     * Set numchasis
     *
     * @param string $numchasis
     * @return Vehicule
     */
    public function setNumchasis($numchasis)
    {
        $this->numchasis = $numchasis;

        return $this;
    }

    /**
     * Get numchasis
     *
     * @return string 
     */
    public function getNumchasis()
    {
        return $this->numchasis;
    }

    /**
     * Set carburant
     *
     * @param string $carburant
     * @return Vehicule
     */
    public function setCarburant($carburant)
    {
        $this->carburant = $carburant;

        return $this;
    }

    /**
     * Get carburant
     *
     * @return string 
     */
    public function getCarburant()
    {
        return $this->carburant;
    }
    
 /**
     * Set dernierkm
     *
     * @param integer $dernierkm
     * @return Vehicule
     */
    public function setDernierkm($dernierkm)
    {
        $this->dernierkm = $dernierkm;

        return $this;
    }

    /**
     * Get dernierkm
     *
     * @return integer 
     */
    public function getDernierkm()
    {
        return $this->dernierkm;
    }
    /**
     * Set prixachat
     *
     * @param integer $prixachat
     * @return Vehicule
     */
    public function setPrixachat($prixachat)
    {
        $this->prixachat = $prixachat;

        return $this;
    }

    /**
     * Get prixachat
     *
     * @return integer
     */
    public function getPrixachat()
    {
        return $this->prixachat;
    }

    /**
     * Set concessionnaire
     *
     * @param string $concessionnaire
     * @return Vehicule
     */
    public function setConcessionnaire($concessionnaire)
    {
        $this->concessionnaire = $concessionnaire;

        return $this;
    }

    /**
     * Get concessionnaire
     *
     * @return string 
     */
    public function getConcessionnaire()
    {
        return $this->concessionnaire;
    }

    /**
     * Set souslocation
     *
     * @param string $souslocation
     * @return Vehicule
     */
    public function setSouslocation($souslocation)
    {
        $this->souslocation = $souslocation;

        return $this;
    }

    /**
     * Get souslocation
     *
     * @return string 
     */
    public function getSouslocation()
    {
        return $this->souslocation;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return Vehicule
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string 
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set puisfiscal
     *
     * @param integer $puisfiscal
     * @return Vehicule
     */
    public function setPuisfiscal($puisfiscal)
    {
        $this->puisfiscal = $puisfiscal;

        return $this;
    }

    /**
     * Get puisfiscal
     *
     * @return integer 
     */
    public function getPuisfiscal()
    {
        return $this->puisfiscal;
    }

    /**
     * Set nbreport
     *
     * @param integer $nbreport
     * @return Vehicule
     */
    public function setNbreport($nbreport)
    {
        $this->nbreport = $nbreport;

        return $this;
    }

    /**
     * Get nbreport
     *
     * @return integer 
     */
    public function getNbreport()
    {
        return $this->nbreport;
    }

    /**
     * Set idcat
     *
     * @param \Vehicules\Entity\Categorie $idcat
     * @return Vehicule
     */
    public function setIdcat(\Vehicules\Entity\Categorie $idcat = null)
    {
        $this->idcat = $idcat;

        return $this;
    }

    /**
     * Get idcat
     *
     * @return \Vehicules\Entity\Categorie 
     */
    public function getIdcat()
    {
        return $this->idcat;
    }

    /**
     * Set idmod
     *
     * @param \Vehicules\Entity\Modele $idmod
     * @return Vehicule
     */
    public function setIdmod(\Vehicules\Entity\Modele $idmod = null)
    {
        $this->idmod = $idmod;

        return $this;
    }

    /**
     * Get idmod
     *
     * @return \Vehicules\Entity\Modele 
     */
    public function getIdmod()
    {
        return $this->idmod;
    }

    /**
     * Add idoptveh
     *
     * @param \Vehicules\Entity\Optionsvehicule $idoptveh
     * @return Vehicule
     */
    public function addIdoptveh(\Vehicules\Entity\Optionsvehicule $idoptveh)
    {
        $this->idoptveh[] = $idoptveh;

        return $this;
    }

    /**
     * Remove idoptveh
     *
     * @param \Vehicules\Entity\Optionsvehicule $idoptveh
     */
    public function removeIdoptveh(\Vehicules\Entity\Optionsvehicule $idoptveh)
    {
        $this->idoptveh->removeElement($idoptveh);
    }

    /**
     * Get idoptveh
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdoptveh()
    {
        return $this->idoptveh;
    }

    public function dati($s){
    	$d2=str_replace('/','-',$s);
    	return new \DateTime($d2);
    }
    public function populate($data,$categorie,$modele) {
    	$this->setMatricule($data['matricule']) ;
    	$this->datemisecirculation= $this->dati($data['datemisecirculation']);
    	$this->setNumchasis($data['numchasis']) ;
    	$this->setStatus($data['status']);
    	$this->setCarburant($data['carburant']) ;
    	$this->setDernierkm($data['dernierKm']) ;
    	$this->setPrixachat($data["prixachat"]) ;
    	$this->setConcessionnaire($data['concessionnaire']) ;
    	$this->setSouslocation($data['souslocation']) ;
    	$this->setRemarque($data['remarque']) ;
    	$this->setPuisfiscal($data['puisfiscal']) ;
    	$this->setNbreport($data['nbreport']) ;
    	$this->setIdcat($categorie) ;
    	$this->setIdmod($modele) ;
    	//$this->addIdstatut() ; /*ghanakhd l option dyal libre */
    	//$this->addIdoptveh($data['option']) ; /* select................*/
        
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
    				'name' => 'matricule',
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
    										'min' => 4,
    										'max' => 14,
    								),
    						),
    				),
    		))); 
            $inputFilter->add($factory->createInput(array(
            		'name' => 'option',
            		'required' => false,
            		
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
