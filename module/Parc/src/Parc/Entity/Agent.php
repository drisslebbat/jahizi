<?php

namespace Parc\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Agent
 *
 * @ORM\Table(name="agent", uniqueConstraints={@ORM\UniqueConstraint(name="AGENT_PK", columns={"idAgent"})})
 * @ORM\Entity
 */
class Agent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAgent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagent;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=254, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=254, nullable=false)
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="usr_password_salt", type="string", length=100, nullable=true)
     */
    private $usrPasswordSalt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;



    /**
     * Get idagent
     *
     * @return integer 
     */
    public function getIdagent()
    {
        return $this->idagent;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Agent
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Agent
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
     * @return Agent
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
     * Set usrPasswordSalt
     *
     * @param string $usrPasswordSalt
     * @return Users
     */
    public function setUsrPasswordSalt($usrPasswordSalt)
    {
    	$this->usrPasswordSalt = $usrPasswordSalt;
    
    	return $this;
    }
    
    /**
     * Get usrPasswordSalt
     *
     * @return string
     */
    public function getUsrPasswordSalt()
    {
    	return $this->usrPasswordSalt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Agent
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     * @return Agent
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    
        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime 
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }
    
    public function create($data) {
    	$this->setNom($data['usr_name']) ;
    	$this->setPrenom($data['usr_prenom']) ;
    	$this->setEmail($data['usr_email']) ;
    	$this->setDateAjout(new \DateTime())  ;
    	$this->setPassword($data['usr_password']);
    	$this->setUsrPasswordSalt($data['usrPasswordSalt']);
    	
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
