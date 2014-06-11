<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vidange
 *
 * @ORM\Table(name="vidange", uniqueConstraints={@ORM\UniqueConstraint(name="VIDANGE_PK", columns={"idVidange"})}, indexes={@ORM\Index(name="POSSEDE_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Vidange
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVidange", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvidange;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVidange", type="date", nullable=false)
     */
    private $datevidange;

    /**
     * @var string
     *
     * @ORM\Column(name="km", type="string", length=254, nullable=true)
     */
    private $km;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $montant;

    /**
     * @var \DateTime
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
     * @var integer
     *
     * @ORM\Column(name="kmProchain", type="integer", nullable=true)
     */
    private $kmprochain;

    /**
     * @var string
     *
     * @ORM\Column(name="garage", type="string", length=254, nullable=true)
     */
    private $garage;
    /**
     * @var string
     *
     * @ORM\Column(name="Coogarage", type="text", nullable=true)
     */
    private $coogarage;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Options", type="string", length=255, nullable=true)
     */
    private $options;
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
     * Get idvidange
     *
     * @return integer 
     */
    public function getIdvidange()
    {
        return $this->idvidange;
    }

    /**
     * Set datevidange
     *
     * @param \DateTime $datevidange
     * @return Vidange
     */
    public function setDatevidange($datevidange)
    {
        $this->datevidange = $datevidange;

        return $this;
    }

    /**
     * Get datevidange
     *
     * @return \DateTime 
     */
    public function getDatevidange()
    {
        return $this->datevidange;
    }

    /**
     * Set km
     *
     * @param string $km
     * @return Vidange
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return string 
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return Vidange
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
     * @return Vidange
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
     * @return Vidange
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
     * @return Vidange
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
     * @return Vidange
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
     * @return Vidange
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
     * Set kmprochain
     *
     * @param integer $kmprochain
     * @return Vidange
     */
    public function setKmprochain($kmprochain)
    {
        $this->kmprochain = $kmprochain;

        return $this;
    }

    /**
     * Get kmprochain
     *
     * @return integer 
     */
    public function getKmprochain()
    {
        return $this->kmprochain;
    }

    /**
     * Set garage
     *
     * @param string $garage
     * @return Vidange
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return string 
     */
    public function getGarage()
    {
        return $this->garage;
    }
    /**
     * Set coogarage
     *
     * @param string $coogarage
     * @return Vidange
     */
    public function setCoogarage($coogarage)
    {
    	$this->coogarage = $coogarage;
    
    	return $this;
    }
    
    /**
     * Get coogarage
     *
     * @return string
     */
    public function getCoogarage()
    {
    	return $this->coogarage;
    }
    
    /**
     * Set options
     *
     * @param string $options
     * @return Vidange
     */
    public function setOptions($options)
    {
    	$this->options = $options;
    
    	return $this;
    }
    
    /**
     * Get options
     *
     * @return string
     */
    public function getOptions()
    {
    	return $this->options;
    }
    

    /**
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Vidange
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
    	$this->datevidange= $this->dati($data['datevidange']);
    	$this->datepaiement= $this->dati($data['datepaiement']);
    	$this->setOptions($data['options']) ;
    	$this->setCoogarage($data['coogarage']) ;
    	$this->setGarage($data['garage']) ;
    	$this->setKmprochain($data['kmprochain']) ;
    	$this->setRemarque($data['remarque']) ;
    	$this->setMontant($data['montant']) ;
    	$this->setKm($data['km']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setIdveh($vehicule);
    	 
    }
}
