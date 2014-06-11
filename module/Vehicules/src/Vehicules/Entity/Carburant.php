<?php

namespace Vehicules\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Carburant
 *
 * @ORM\Table(name="carburant", uniqueConstraints={@ORM\UniqueConstraint(name="CARBURANT_PK", columns={"idCarb"})}, indexes={@ORM\Index(name="ASSOCIATION10_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Carburant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCarb", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcarb;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=false)
     */
    private $type;

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
     * @ORM\Column(name="cooVendeur", type="string", length=254, nullable=true)
     */
    private $coovendeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrLitre", type="integer", nullable=true)
     */
    private $nbrlitre;

    /**
     * @var string
     *
     * @ORM\Column(name="typeCarb", type="string", length=254, nullable=true)
     */
    private $typecarb;

    /**
     * @var string
     *
     * @ORM\Column(name="vendeur", type="string", length=255, nullable=true)
     */
    private $vendeur;

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
     * Get idcarb
     *
     * @return integer 
     */
    public function getIdcarb()
    {
        return $this->idcarb;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Carburant
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return Carburant
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
     * @param \Date $datepaiement
     * @return Carburant
     */
    public function setDatepaiement($datepaiement)
    {   $this->datepaiement =$datepaiement;
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
     * @return Carburant
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
     * @return Carburant
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
     * @return Carburant
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
     * @return Carburant
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
     * Set coovendeur
     *
     * @param string $coovendeur
     * @return Carburant
     */
    public function setCoovendeur($coovendeur)
    {
        $this->coovendeur = $coovendeur;

        return $this;
    }

    /**
     * Get coovendeur
     *
     * @return string 
     */
    public function getCoovendeur()
    {
        return $this->coovendeur;
    }

    /**
     * Set nbrlitre
     *
     * @param integer $nbrlitre
     * @return Carburant
     */
    public function setNbrlitre($nbrlitre)
    {
        $this->nbrlitre = $nbrlitre;

        return $this;
    }

    /**
     * Get nbrlitre
     *
     * @return integer 
     */
    public function getNbrlitre()
    {
        return $this->nbrlitre;
    }

    /**
     * Set typecarb
     *
     * @param string $typecarb
     * @return Carburant
     */
    public function setTypecarb($typecarb)
    {
        $this->typecarb = $typecarb;

        return $this;
    }

    /**
     * Get typecarb
     *
     * @return string 
     */
    public function getTypecarb()
    {
        return $this->typecarb;
    }

    /**
     * Set vendeur
     *
     * @param string $vendeur
     * @return Carburant
     */
    public function setVendeur($vendeur)
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * Get vendeur
     *
     * @return string 
     */
    public function getVendeur()
    {
        return $this->vendeur;
    }

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
    	$this->setTypecarb($data['typecarb']) ;
    	$this->setNbrlitre($data['nbrlitre']) ;
    	$this->setCoovendeur($data['coovendeur']) ;
    	$this->setRemarque($data['remarque']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setMontant($data['montant']) ;
    	$this->setType($data['type']) ;
    	$this->setIdveh($vehicule);
}
     
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
