<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vignette
 *
 * @ORM\Table(name="vignette", uniqueConstraints={@ORM\UniqueConstraint(name="VIGNETTE_PK", columns={"idVign"})}, indexes={@ORM\Index(name="ASSOCIATION4_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Vignette
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVign", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvign;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

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
     * @var \Vehicules\Entity\Vehicule
     *
     * @ORM\ManyToOne(targetEntity="Vehicules\Entity\Vehicule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVeh", referencedColumnName="idVeh")
     * })
     */
    private $idveh;



    /**
     * Get idvign
     *
     * @return integer 
     */
    public function getIdvign()
    {
        return $this->idvign;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Vignette
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
     * @return Vignette
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
     * @return Vignette
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
     * @return Vignette
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
     * @return Vignette
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
     * @return Vignette
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
     * @return Vignette
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
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Vignette
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
    	$this->datepaiement= $this->dati($data['datepaiement']);
    	$this->setType($data['type']) ;
    	$this->setRemarque($data['remarque']) ;
    	$this->setMontant($data['montant']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setIdveh($vehicule);
    
    }
}
