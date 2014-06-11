<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitetechnique
 *
 * @ORM\Table(name="visitetechnique", uniqueConstraints={@ORM\UniqueConstraint(name="VISITETECHNIQUE_PK", columns={"idVisite"})}, indexes={@ORM\Index(name="ASSOCIATION3_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Visitetechnique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVisite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvisite;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateVisite", type="date", nullable=false)
     */
    private $datevisite;

    /**
     * @var string
     *
     * @ORM\Column(name="centre", type="string", length=254, nullable=true)
     */
    private $centre;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $montant;

    /**
     * @var \Date
     *
     * @ORM\Column(name="datePaiement", type="date", nullable=false)
     */
    private $datepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="modeReg", type="string", length=254, nullable=false)
     */
    private $modereg;

    /**
     * @var integer
     *
     * @ORM\Column(name="numCheq", type="integer", nullable=true)
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
     * @ORM\Column(name="cordCentre", type="string", length=254, nullable=true)
     */
    private $cordcentre;

    /**
     * @var \DateTime
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
     * Get idvisite
     *
     * @return integer 
     */
    public function getIdvisite()
    {
        return $this->idvisite;
    }

    /**
     * Set datevisite
     *
     * @param \DateTime $datevisite
     * @return Visitetechnique
     */
    public function setDatevisite($datevisite)
    {
        $this->datevisite = $datevisite;

        return $this;
    }

    /**
     * Get datevisite
     *
     * @return \DateTime 
     */
    public function getDatevisite()
    {
        return $this->datevisite;
    }

    /**
     * Set centre
     *
     * @param string $centre
     * @return Visitetechnique
     */
    public function setCentre($centre)
    {
        $this->centre = $centre;

        return $this;
    }

    /**
     * Get centre
     *
     * @return string 
     */
    public function getCentre()
    {
        return $this->centre;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return Visitetechnique
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     * @return Visitetechnique
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime 
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * Set modereg
     *
     * @param string $modereg
     * @return Visitetechnique
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
     * @param integer $numcheq
     * @return Visitetechnique
     */
    public function setNumcheq($numcheq)
    {
        $this->numcheq = $numcheq;

        return $this;
    }

    /**
     * Get numcheq
     *
     * @return integer 
     */
    public function getNumcheq()
    {
        return $this->numcheq;
    }

    /**
     * Set banque
     *
     * @param string $banque
     * @return Visitetechnique
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
     * @return Visitetechnique
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
     * Set cordcentre
     *
     * @param string $cordcentre
     * @return Visitetechnique
     */
    public function setCordcentre($cordcentre)
    {
        $this->cordcentre = $cordcentre;

        return $this;
    }

    /**
     * Get cordcentre
     *
     * @return string 
     */
    public function getCordcentre()
    {
        return $this->cordcentre;
    }

    /**
     * Set dateexp
     *
     * @param \DateTime $dateexp
     * @return Visitetechnique
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
     * @return Visitetechnique
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
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
    public function dati($s){
    	$d2=str_replace('/','-',$s);
    	return new \DateTime($d2);
    }
    public function populate($data,$vehicule) {
    	$this->dateexp= $this->dati($data['dateexp']);
    	$this->datevisite= $this->dati($data['datevisite']);
    	$this->datepaiement= $this->dati($data['datepaiement']);
    	$this->setCordcentre($data['cordcentre']) ;
    	$this->setCentre($data['centre']) ;
    	$this->setRemarque($data['remarque']) ;
    	$this->setMontant($data['montant']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setIdveh($vehicule);
    
    }
}
