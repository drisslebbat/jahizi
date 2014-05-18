<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
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
     * @ORM\Column(name="Ent_nom", type="string", length=254, nullable=true)
     */
    private $entNom;

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
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
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
     * @var integer
     *
     * @ORM\Column(name="code_pays", type="integer", nullable=false)
     */
    private $codePays;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_del_permis", type="string", length=30, nullable=false)
     */
    private $lieuDelPermis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_del_CIN", type="date", nullable=true)
     */
    private $dateDelCin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDelPassport", type="date", nullable=true)
     */
    private $datedelpassport;



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
     * Set entNom
     *
     * @param string $entNom
     * @return Client
     */
    public function setEntNom($entNom)
    {
        $this->entNom = $entNom;
    
         
    }

    /**
     * Get entNom
     *
     * @return string 
     */
    public function getEntNom()
    {
        return $this->entNom;
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
    public function setDatenaissance( $datenaissance)
    {
        $this->datenaissance = \DateTime::createFromFormat('Y-m-d',$datenaissance);
    
         
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
        $this->datedelpermis = \DateTime::createFromFormat('Y-m-d',$datedelpermis);
    
         
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
     * Set codePays
     *
     * @param integer $codePays
     * @return Client
     */
    public function setCodePays($codePays)
    {
        $this->codePays = $codePays;
    
         
    }

    /**
     * Get codePays
     *
     * @return integer 
     */
    public function getCodePays()
    {
        return $this->codePays;
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
        $this->dateDelCin = \DateTime::createFromFormat('Y-m-d',$dateDelCin);
    
         
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
     * Set datedelpassport
     *
     * @param \DateTime $datedelpassport
     * @return Client
     */
    public function setDatedelpassport( $datedelpassport)
    {
        $this->datedelpassport = \DateTime::createFromFormat('Y-m-d',$datedelpassport);
    
         
    }

    /**
     * Get datedelpassport
     *
     * @return \DateTime 
     */
    public function getDatedelpassport()
    {
        return $this->datedelpassport;
    }
	
    public function create($data) {
    	$this->setNom($data['nom']) ;   
    	$this->setPrenom($data['prenom']) ;     
    	$this->setEmailClient($data['email']) ;
    	$this->setType($data['type']);      
    	$this->setDatenaissance($data['date_naissance'])  ;   
    	$this->setNumpassport($data['passport']);
    	$this->setCin($data['cin']);  
    	$this->setNumpermis($data['num_permis']);
    	$this->setDatedelpermis($data['date_permis']); 
    	$this->setAdresse($data['Adresse']);    
    	$this->setLieuDelPermis($data['Lieu_permis']);  
    	$this->setDateDelCin($data['Date_cin']);
    	$this->setDatedelpassport($data['Date_passport']);
    	$this->setRemarques($data['remarque'])  ;
    	$this->setEntNom($data['Entreprise']) ;   
    	$this->setTelephone($data['tel']) ;
    	$this->setCodePays($data['Nationalite']);
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
	