<?php

namespace Parc\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Depenses
 *
 * @ORM\Table(name="depenses", indexes={@ORM\Index(name="FK_association26", columns={"idAgence"})})
 * @ORM\Entity
 */
class Depenses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idDep", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddep;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=254, nullable=true)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="mantant", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $mantant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePaiement", type="datetime", nullable=true)
     */
    private $datepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="modeReg", type="string", length=254, nullable=true)
     */
    private $modereg;

    /**
     * @var integer
     *
     * @ORM\Column(name="numCheque", type="integer", nullable=true)
     */
    private $numcheque;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=254, nullable=true)
     */
    private $remarque;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=254, nullable=true)
     */
    private $banque;

    /**
     * @var \Parc\Entity\Agence
     *
     * @ORM\ManyToOne(targetEntity="Parc\Entity\Agence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAgence", referencedColumnName="idAgence")
     * })
     */
    private $idagence;



    /**
     * Get iddep
     *
     * @return integer 
     */
    public function getIddep()
    {
        return $this->iddep;
    }

    /**
     * Set nature
     *
     * @param string $nature
     * @return Depenses
     */
    public function setNature($nature)
    {
        $this->nature = $nature;
    
        return $this;
    }

    /**
     * Get nature
     *
     * @return string 
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set mantant
     *
     * @param string $mantant
     * @return Depenses
     */
    public function setMantant($mantant)
    {
        $this->mantant = $mantant;
    
        return $this;
    }

    /**
     * Get mantant
     *
     * @return string 
     */
    public function getMantant()
    {
        return $this->mantant;
    }

    /**
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     * @return Depenses
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
     * @return Depenses
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
     * Set numcheque
     *
     * @param integer $numcheque
     * @return Depenses
     */
    public function setNumcheque($numcheque)
    {
        $this->numcheque = $numcheque;
    
        return $this;
    }

    /**
     * Get numcheque
     *
     * @return integer 
     */
    public function getNumcheque()
    {
        return $this->numcheque;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return Depenses
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
     * Set banque
     *
     * @param string $banque
     * @return Depenses
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
     * Set idagence
     *
     * @param \Parc\Entity\Agence $idagence
     * @return Depenses
     */
    public function setIdagence(\Parc\Entity\Agence $idagence = null)
    {
        $this->idagence = $idagence;
    
        return $this;
    }

    /**
     * Get idagence
     *
     * @return \Parc\Entity\Agence 
     */
    public function getIdagence()
    {
        return $this->idagence;
    }
    public function create($data) {
    	$this->setNature($data['nature']) ;
    	$this->setMantant($data['montant']) ;
    	$this->setBanque($data['banquel']) ;
    	$this->setModereg($data['mode_paiement']);
    	$this->setDatepaiement($data['date'])  ;
    	$this->setNumcheque($data['num_cheque']);
    	$this->setRemarque($data['remarques']);
    	
 
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
