<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\DateTime;

/**
 * Parc
 *
 * @ORM\Table(name="parc")
 * @ORM\Entity
 */
class Parc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idParc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparc;

    /**
     * @var string
     *
     * @ORM\Column(name="nomParc", type="string", length=40, nullable=false)
     */
    private $nomparc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration", type="datetime", nullable=true)
     */
    private $dateExpiration;

    /**
     * @var integer
     *
     * @ORM\Column(name="pack", type="integer", nullable=false)
     */
    private $pack;

    /**
     * @var string
     *
     * @ORM\Column(name="devis", type="string", length=40, nullable=true)
     */
    private $devis;



    /**
     * Get idparc
     *
     * @return integer 
     */
    public function getIdparc()
    {
        return $this->idparc;
    }

    /**
     * Set nomparc
     *
     * @param string $nomparc
     * @return Parc
     */
    public function setNomparc($nomparc)
    {
        $this->nomparc = $nomparc;
    
        return $this;
    }

    /**
     * Get nomparc
     *
     * @return string 
     */
    public function getNomparc()
    {
        return $this->nomparc;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Parc
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation =  $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateExpiration
     *
     * @param \DateTime $dateExpiration
     * @return Parc
     */
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = \DateTime::createFromFormat('Y-m-d',$dateExpiration);
    
        return $this;
    }

    /**
     * Get dateExpiration
     *
     * @return \DateTime 
     */
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }

    /**
     * Set pack
     *
     * @param integer $pack
     * @return Parc
     */
    public function setPack($pack)
    {
        $this->pack = $pack;
    
        return $this;
    }

    /**
     * Get pack
     *
     * @return integer 
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Set devis
     *
     * @param string $devis
     * @return Parc
     */
    public function setDevis($devis)
    {
        $this->devis = $devis;
    
        return $this;
    }

    /**
     * Get devis
     *
     * @return string 
     */
    public function getDevis()
    {
        return $this->devis;
    }
    public function create($data) {
    	$this->setNomparc($data['parc_name']) ;
    	$this->setDateCreation(new \DateTime()) ;
    	$this->setDateExpiration($data['date']) ;
    	$this->setDevis($data['devis']);
    	$this->setPack($data['num_pack'])  ;
    
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
