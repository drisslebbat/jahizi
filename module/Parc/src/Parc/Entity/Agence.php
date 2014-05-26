<?php

namespace Parc\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agence
 *
 * @ORM\Table(name="agence")
 * @ORM\Entity
 */
class Agence
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAgence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagence;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=254, nullable=true)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pack", type="string", length=254, nullable=true)
     */
    private $pack;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=254, nullable=true)
     */
    private $couleur;



    /**
     * Get idagence
     *
     * @return integer 
     */
    public function getIdagence()
    {
        return $this->idagence;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Agence
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
     * Set site
     *
     * @param string $site
     * @return Agence
     */
    public function setSite($site)
    {
        $this->site = $site;
    
        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Agence
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
     * Set pack
     *
     * @param string $pack
     * @return Agence
     */
    public function setPack($pack)
    {
        $this->pack = $pack;
    
        return $this;
    }

    /**
     * Get pack
     *
     * @return string 
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     * @return Agence
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    
        return $this;
    }

    /**
     * Get couleur
     *
     * @return string 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
    
    public function create($data) {
    	$this->setNom($data['agence_name']) ;
    	$this->setCouleur($data['agence_couleur']) ;
    	$this->setEmail($data['agence_email']) ;
    	$this->setSite($data['agence_site']);
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
