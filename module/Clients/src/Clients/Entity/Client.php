<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 * @ORM\Table(name="client", indexes={@ORM\Index(name="FK_association17", columns={"Ent_nom"})})
 * @ORM\Entity
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=254, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=254, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime", nullable=true)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="numPassport", type="string", length=254, nullable=true)
     */
    private $numpassport;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=254, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="autres", type="string", length=254, nullable=true)
     */
    private $autres;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="string", length=254, nullable=true)
     */
    private $remarques;

    /**
     * @var string
     *
     * @ORM\Column(name="numPermis", type="string", length=254, nullable=false)
     */
    private $numpermis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDelPermis", type="date", nullable=true)
     */
    private $datedelpermis;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=254, nullable=false)
     */
    private $adresse;

    /**
     * @var \Clients\Entity\Entrepris
     *
     * @ORM\ManyToOne(targetEntity="Clients\Entity\Entrepris")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ent_nom", referencedColumnName="nom")
     * })
     */
    private $entNom;



    /**
     * Get idclient
     *
     * @return integer 
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return Client
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    
        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     * @return Client
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    
        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set numpassport
     *
     * @param string $numpassport
     * @return Client
     */
    public function setNumpassport($numpassport)
    {
        $this->numpassport = $numpassport;
    
        return $this;
    }

    /**
     * Get numpassport
     *
     * @return string 
     */
    public function getNumpassport()
    {
        return $this->numpassport;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Client
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Client
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
     * Set autres
     *
     * @param string $autres
     * @return Client
     */
    public function setAutres($autres)
    {
        $this->autres = $autres;
    
        return $this;
    }

    /**
     * Get autres
     *
     * @return string 
     */
    public function getAutres()
    {
        return $this->autres;
    }

    /**
     * Set remarques
     *
     * @param string $remarques
     * @return Client
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
     * Set numpermis
     *
     * @param string $numpermis
     * @return Client
     */
    public function setNumpermis($numpermis)
    {
        $this->numpermis = $numpermis;
    
        return $this;
    }

    /**
     * Get numpermis
     *
     * @return string 
     */
    public function getNumpermis()
    {
        return $this->numpermis;
    }

    /**
     * Set datedelpermis
     *
     * @param \DateTime $datedelpermis
     * @return Client
     */
    public function setDatedelpermis($datedelpermis)
    {
        $this->datedelpermis = $datedelpermis;
    
        return $this;
    }

    /**
     * Get datedelpermis
     *
     * @return \DateTime 
     */
    public function getDatedelpermis()
    {
        return $this->datedelpermis;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set entNom
     *
     * @param \Clients\Entity\Entrepris $entNom
     * @return Client
     */
    public function setEntNom(\Clients\Entity\Entrepris $entNom = null)
    {
        $this->entNom = $entNom;
    
        return $this;
    }

    /**
     * Get entNom
     *
     * @return \Clients\Entity\Entrepris 
     */
    public function getEntNom()
    {
        return $this->entNom;
    }
}
