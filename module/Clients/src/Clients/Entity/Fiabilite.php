<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fiabilite
 *
 * @ORM\Table(name="fiabilite", indexes={@ORM\Index(name="client", columns={"client"})})
 * @ORM\Entity
 */
class Fiabilite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=254, nullable=false)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=254, nullable=true)
     */
    private $remarque;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \Clients\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="Clients\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client", referencedColumnName="idClient")
     * })
     */
    private $client;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Fiabilite
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return Fiabilite
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
     * Set date
     *
     * @param \DateTime $date
     * @return Fiabilite
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
     * Set client
     *
     * @param \Clients\Entity\Client $client
     * @return Fiabilite
     */
    public function setClient(\Clients\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \Clients\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
