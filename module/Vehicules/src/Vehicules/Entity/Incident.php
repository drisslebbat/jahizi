<?php

namespace Vehicules\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Incident
 *
 * @ORM\Table(name="incident", uniqueConstraints={@ORM\UniqueConstraint(name="INCIDENT_PK", columns={"idIncid"})}, indexes={@ORM\Index(name="ASSOCIATION5_FK", columns={"idVeh"})})
 * @ORM\Entity
 */
class Incident
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idIncid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idincid;

    /**
     * @var string
     *
     * @ORM\Column(name="nrPolice", type="string", length=254, nullable=true)
     */
    private $nrpolice;

    /**
     * @var integer
     *
     * @ORM\Column(name="nrPv", type="integer", nullable=true)
     */
    private $nrpv;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateIncident", type="date", nullable=true)
     */
    private $dateincident;

    /**
     * @var string
     *
     * @ORM\Column(name="expert", type="string", length=254, nullable=true)
     */
    private $expert;

    /**
     * @var string
     *
     * @ORM\Column(name="garage", type="string", length=254, nullable=true)
     */
    private $garage;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="string", length=254, nullable=true)
     */
    private $remarques;

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
     * Get idincid
     *
     * @return integer 
     */
    public function getIdincid()
    {
        return $this->idincid;
    }

    /**
     * Set nrpolice
     *
     * @param string $nrpolice
     * @return Incident
     */
    public function setNrpolice($nrpolice)
    {
        $this->nrpolice = $nrpolice;

        return $this;
    }

    /**
     * Get nrpolice
     *
     * @return string 
     */
    public function getNrpolice()
    {
        return $this->nrpolice;
    }

    /**
     * Set nrpv
     *
     * @param integer $nrpv
     * @return Incident
     */
    public function setNrpv($nrpv)
    {
        $this->nrpv = $nrpv;

        return $this;
    }

    /**
     * Get nrpv
     *
     * @return integer 
     */
    public function getNrpv()
    {
        return $this->nrpv;
    }

    /**
     * Set dateincident
     *
     * @param \Date $dateincident
     * @return Incident
     */
    public function setDateincident($dateincident)
    {   
        $this->dateincident = $dateincident;

        return $this;
    }

    /**
     * Get dateincident
     *
     * @return \Date
     */
    public function getDateincident()
    {
        return $this->dateincident;
    }

    /**
     * Set expert
     *
     * @param string $expert
     * @return Incident
     */
    public function setExpert($expert)
    {
        $this->expert = $expert;

        return $this;
    }

    /**
     * Get expert
     *
     * @return string 
     */
    public function getExpert()
    {
        return $this->expert;
    }

    /**
     * Set garage
     *
     * @param string $garage
     * @return Incident
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
     * Set remarques
     *
     * @param string $remarques
     * @return Incident
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;

        return $this;
    }

    /**
     * Get remarques
     *
     * @return string 
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * Set idveh
     *
     * @param \Vehicules\Entity\Vehicule $idveh
     * @return Incident
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
    	$this->dateincident= $this->dati($data['dateincident']);
    	$this->setRemarques($data['remarques']) ;
    	$this->setGarage($data['garage']) ;
    	$this->setExpert($data['expert']) ;
    	$this->setNrpv($data['nrpv']) ;
    	$this->setNrpolice($data['nrpolice']) ;
    	$this->setIdveh($vehicule);
}
    
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
