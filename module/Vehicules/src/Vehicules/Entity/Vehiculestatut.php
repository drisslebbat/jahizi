<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehiculestatut
 *
 * @ORM\Table(name="vehiculestatut", uniqueConstraints={@ORM\UniqueConstraint(name="VEHICULESTATUT_PK", columns={"idStatut"})}, indexes={@ORM\Index(name="ASSOCIATION999_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Vehiculestatut
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idStatut", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstatut;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=254, nullable=false)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="cause", type="string", length=254, nullable=true)
     */
    private $cause;

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
     * Constructor
     */
    public function __construct()
    {
        $this->idveh = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idstatut
     *
     * @return integer 
     */
    public function getIdstatut()
    {
        return $this->idstatut;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Vehiculestatut
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Vehiculestatut
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cause
     *
     * @param string $cause
     * @return Vehiculestatut
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Get cause
     *
     * @return string 
     */
    public function getCause()
    {
        return $this->cause;
    }

  /**
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Vehiculestatut
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
    public function populate($data,$veh) {
    	$this->date= new \DateTime();
    	$this->setLibelle($data['status']) ;
    	$this->setIdveh($veh);
}}
