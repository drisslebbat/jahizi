<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparation
 *
 * @ORM\Table(name="reparation", uniqueConstraints={@ORM\UniqueConstraint(name="REPARATION_PK", columns={"idRep"})}, indexes={@ORM\Index(name="POSSEDE_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Reparation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRep", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRep", type="date", nullable=false)
     */
    private $daterep;

    /**
     * @var string
     *
     * @ORM\Column(name="garage", type="string", length=254, nullable=true)
     */
    private $garage;

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
     * Get idrep
     *
     * @return integer 
     */
    public function getIdrep()
    {
        return $this->idrep;
    }

    /**
     * Set daterep
     *
     * @param \DateTime $daterep
     * @return Reparation
     */
    public function setDaterep($daterep)
    {
        $this->daterep = $daterep;

        return $this;
    }

    /**
     * Get daterep
     *
     * @return \DateTime 
     */
    public function getDaterep()
    {
        return $this->daterep;
    }

    /**
     * Set garage
     *
     * @param string $garage
     * @return Reparation
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
     * Set type
     *
     * @param string $type
     * @return Reparation
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
     * @return Reparation
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
     * @return Reparation
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
     * @return Reparation
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
     * @return Reparation
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
     * @return Reparation
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
     * @return Reparation
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
     * @return Reparation
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
        $this->daterep= $this->dati($data['daterep']);
    	$this->datepaiement= $this->dati($data['datepaiement']);
    	$this->setRemarque($data['remarque']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setMontant($data['montant']) ;
    	$this->setGarage($data['garage']) ;
    	$this->setType($data['type']) ;
    	$this->setIdveh($vehicule);
    	 
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
