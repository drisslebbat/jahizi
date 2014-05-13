<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="code_pays", columns={"code_pays"}), @ORM\Index(name="Ent_nom", columns={"Ent_nom"})})
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDelPassport", type="date", nullable=true)
     */
    private $datedelpassport;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=254, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="email_client", type="string", length=40, nullable=false)
     */
    private $emailClient;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_del_permis", type="string", length=30, nullable=false)
     */
    private $lieuDelPermis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_del_CIN", type="date", nullable=false)
     */
    private $dateDelCin;

    /**
     * @var \Clients\Entity\Nationalite
     *
     * @ORM\ManyToOne(targetEntity="Clients\Entity\Nationalite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_pays", referencedColumnName="code")
     * })
     */
    private $codePays;

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
	 * @return the $datedelpassport
	 */
	public function getDatedelpassport() {
		return $this->datedelpassport;
	}

	/**
	 * @param DateTime $datedelpassport
	 */
	public function setDatedelpassport($datedelpassport) {
		$this->datedelpassport = $datedelpassport;
	}

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
     * Set emailClient
     *
     * @param string $emailClient
     * @return Client
     */
    public function setEmailClient($emailClient)
    {
        $this->emailClient = $emailClient;
    
        return $this;
    }

    /**
     * Get emailClient
     *
     * @return string 
     */
    public function getEmailClient()
    {
        return $this->emailClient;
    }

    /**
     * Set lieuDelPermis
     *
     * @param string $lieuDelPermis
     * @return Client
     */
    public function setLieuDelPermis($lieuDelPermis)
    {
        $this->lieuDelPermis = $lieuDelPermis;
    
        return $this;
    }

    /**
     * Get lieuDelPermis
     *
     * @return string 
     */
    public function getLieuDelPermis()
    {
        return $this->lieuDelPermis;
    }

    /**
     * Set dateDelCin
     *
     * @param \DateTime $dateDelCin
     * @return Client
     */
    public function setDateDelCin($dateDelCin)
    {
        $this->dateDelCin = $dateDelCin;
    
        return $this;
    }

    /**
     * Get dateDelCin
     *
     * @return \DateTime 
     */
    public function getDateDelCin()
    {
        return $this->dateDelCin;
    }

    /**
     * Set codePays
     *
     * @param \Clients\Entity\Nationalite $codePays
     * @return Client
     */
    public function setCodePays(\Clients\Entity\Nationalite $codePays = null)
    {
        $this->codePays = $codePays;
    
        return $this;
    }

    /**
     * Get codePays
     *
     * @return \Clients\Entity\Nationalite 
     */
    public function getCodePays()
    {
        return $this->codePays;
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
    
    public function create($data) {
    	$this->nom       = (isset($data['nom'])) ? $data['nom'] : null;
    	$this->prenom      = (isset($data['prenom'])) ? $data['prenom'] : null;
    	$this->emailClient      = (isset($data['email'])) ? $data['email'] : null;
    	$this->type      = (isset($data['type'])) ? $data['type'] : null;
    	$this->datenaissance      = (isset($data['date_naissance'])) ? $data['date_naissance'] : null;
    	$this->numpassport      = (isset($data['passport'])) ? $data['passport'] : null;
    	$this->cin      = (isset($data['cin'])) ? $data['cin'] : null;
    	$this->numpermis      = (isset($data['num_permis'])) ? $data['num_permis'] : null;
    	$this->datedelpermis      = (isset($data['date_permis'])) ? $data['date_permis'] : null;
    	$this->adresse      = (isset($data['Adresse'])) ? $data['Adresse'] : null;
    	$this->lieuDelPermis      = (isset($data['Lieu_permis'])) ? $data['Lieu_permis'] : null;
    	$this->dateDelCin      = (isset($data['Date_cin'])) ? $data['Date_cin'] : null;
    	$this->datedelpassport     = (isset($data['Date_passport'])) ? $data['Date_passport'] : null;
    	$this->remarques     = (isset($data['remarque'])) ? $data['remarque'] : null;
    	$this->entNom     = (isset($data['Entreprise'])) ? $data['Entreprise'] : null;
    	$this->telephone   = (isset($data['tel'])) ? $data['tel'] : null;
    	
    
    }
}
