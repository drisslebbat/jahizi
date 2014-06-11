<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Piececonsommable
 *
 * @ORM\Table(name="piececonsommable", uniqueConstraints={@ORM\UniqueConstraint(name="PIECECONSOMMABLE_PK", columns={"idPiece"})}, indexes={@ORM\Index(name="ASSOCIATION8_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Piececonsommable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPiece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpiece;

    /**
     * @var string
     *
     * @ORM\Column(name="vendeur", type="string", length=254, nullable=false)
     */
    private $vendeur;

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
     * @var string
     *
     * @ORM\Column(name="cooVendeur", type="string", length=254, nullable=true)
     */
    private $coovendeur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomPiece", type="string", length=254, nullable=true)
     */
    private $nompiece;

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
     * Get idpiece
     *
     * @return integer 
     */
    public function getIdpiece()
    {
        return $this->idpiece;
    }

    /**
     * Set type
     *
     * @param string $vendeur
     * @return Piececonsommable
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

    /**
     * Set montant
     *
     * @param float $montant
     * @return Piececonsommable
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
     * @return Piececonsommable
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
     * @return Piececonsommable
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
     * @return Piececonsommable
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
     * @return Piececonsommable
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
     * @return Piececonsommable
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
     * @return Piececonsommable
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
     * Set nompiece
     *
     * @param string $nompiece
     * @return Piececonsommable
     */
    public function setNompiece($nompiece)
    {
        $this->nompiece = $nompiece;

        return $this;
    }

    /**
     * Get nompiece
     *
     * @return string 
     */
    public function getNompiece()
    {
        return $this->nompiece;
    }

    /**
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Piececonsommable
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
    	$this->setNompiece($data['nompiece']) ;
    	$this->setCoovendeur($data['coovendeur']) ;
    	$this->setRemarque($data['remarque']) ;
    	$this->setNumcheq($data['numcheq']) ;
    	$this->setModereg($data['modereg']) ;
    	$this->setBanque($data['banque']) ;
    	$this->setMontant($data['montant']) ;
    	$this->setVendeur($data['vendeur']) ;
    	$this->setIdveh($vehicule);
    	 
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
