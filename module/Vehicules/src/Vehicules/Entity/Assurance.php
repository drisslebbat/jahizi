<?php

namespace Vehicules\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Assurance
 *
 * @ORM\Table(name="assurance", uniqueConstraints={@ORM\UniqueConstraint(name="ASSURANCE_PK", columns={"idAsc"})}, indexes={@ORM\Index(name="ASSOCIATION7_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Assurance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAsc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idasc;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut ;

    /**
     * @var string
     *
     * @ORM\Column(name="assureur", type="string", length=254, nullable=true)
     */
    private $assureur;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="string", nullable=false)
     */
    private $montant;

    /**
     * @var \Date 
     *
     * @ORM\Column(name="datePaiement", type="date", nullable=false)
     */
    private $datepaiement ;

    /**
     * @var string
     *
     * @ORM\Column(name="modeReg", type="string", length=254, nullable=false)
     */
    private $modereg;

    /**
     * @var string
     *
     * @ORM\Column(name="numCheq", type="string", length=254, nullable=true)
     */
    private $numcheq;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=254, nullable=true)
     */
    private $banque;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=254, nullable=true)
     */
    private $remarque;

    /**
     * @var string
     *
     * @ORM\Column(name="cordAssureur", type="string", length=254, nullable=true)
     */
    private $cordassureur;

    /**
     * @var \Date 
     *
     * @ORM\Column(name="dateExp", type="date", nullable=true)
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
     * Get idasc
     *
     * @return integer 
     */
    public function getIdasc()
    {
        return $this->idasc;
    }

    /**
     * Set datedebut
     *
     * @param \Date  $datedebut
     * @return Assurance
     */
    public function setDatedebut($datedebut)
    {
    	$this->datedebut=datedebut;
        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \Date  
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set assureur
     *
     * @param string $assureur
     * @return Assurance
     */
    public function setAssureur($assureur)
    {
        $this->assureur = $assureur;

        return $this;
    }

    /**
     * Get assureur
     *
     * @return string 
     */
    public function getAssureur()
    {
        return $this->assureur;
    }

    /**
     * Set montant
     *
     * @param string $montant
     * @return Assurance
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set datepaiement
     *
     * @param \Date  $datepaiement
     * @return Assurance
     */
    public function setDatepaiement($datepaiement)
    {    $this->datepaiement = $datepaiement;
    	 return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \Date  
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * Set modereg
     *
     * @param string $modereg
     * @return Assurance
     */
    public function setModereg($modereg)
    {
        $this->modereg = $modereg;

        return $this;
    }

    /**
     * Get modereg
     *
     * @return string 
     */
    public function getModereg()
    {
        return $this->modereg;
    }

    /**
     * Set numcheq
     *
     * @param string $numcheq
     * @return Assurance
     */
    public function setNumcheq($numcheq)
    {
        $this->numcheq = $numcheq;

        return $this;
    }

    /**
     * Get numcheq
     *
     * @return string 
     */
    public function getNumcheq()
    {
        return $this->numcheq;
    }

    /**
     * Set banque
     *
     * @param string $banque
     * @return Assurance
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return string 
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return Assurance
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
     * Set cordassureur
     *
     * @param string $cordassureur
     * @return Assurance
     */
    public function setCordassureur($cordassureur)
    {
        $this->cordassureur = $cordassureur;

        return $this;
    }

    /**
     * Get cordassureur
     *
     * @return string 
     */
    public function getCordassureur()
    {
        return $this->cordassureur;
    }

    /**
     * Set dateexp
     *
     * @param \Date  $dateexp
     * @return Assurance
     */
    public function setDateexp($dateexp)
    {
      $this->dateexp = $dateexp;
    	 return $this;
    }
    

    /**
     * Get dateexp
     *
     * @return \Date  
     */
    public function getDateexp()
    {
        return $this->dateexp;
    }

    /**
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Assurance
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
        $this->datepaiement= $this->dati($data['datepaiement']);
        $this->dateexp= $this->dati($data['dateexp']);
        $this->datedebut= $this->dati($data['datedebut']);
    	$this->setMontant($data['montant']) ;
    	$this->setCordassureur($data['cordassureur']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setIdveh($vehicule);
    	return $this ;
    	
     }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
