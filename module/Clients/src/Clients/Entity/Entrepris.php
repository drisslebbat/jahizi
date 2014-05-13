<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrepris
 *
 * @ORM\Table(name="entrepris")
 * @ORM\Entity
 */
class Entrepris
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="raisonSocial", type="string", length=254, nullable=true)
     */
    private $raisonsocial;

    /**
     * @var string
     *
     * @ORM\Column(name="rc", type="string", length=254, nullable=true)
     */
    private $rc;

    /**
     * @var string
     *
     * @ORM\Column(name="inter_fin", type="string", length=254, nullable=true)
     */
    private $interFin;



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
	 * @param string $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

	/**
     * Set raisonsocial
     *
     * @param string $raisonsocial
     * @return Entrepris
     */
    public function setRaisonsocial($raisonsocial)
    {
        $this->raisonsocial = $raisonsocial;
    
        return $this;
    }

    /**
     * Get raisonsocial
     *
     * @return string 
     */
    public function getRaisonsocial()
    {
        return $this->raisonsocial;
    }

    /**
     * Set rc
     *
     * @param string $rc
     * @return Entrepris
     */
    public function setRc($rc)
    {
        $this->rc = $rc;
    
        return $this;
    }

    /**
     * Get rc
     *
     * @return string 
     */
    public function getRc()
    {
        return $this->rc;
    }

    /**
     * Set interFin
     *
     * @param string $interFin
     * @return Entrepris
     */
    public function setInterFin($interFin)
    {
        $this->interFin = $interFin;
    
        return $this;
    }

    /**
     * Get interFin
     *
     * @return string 
     */
    public function getInterFin()
    {
        return $this->interFin;
    }
    
    public function create($data) {
    	$this->setNom($data['Entreprise']);
    	$this->setRaisonsocial($data['Raison_social']);
    	$this->setRc($data['rc']);
    	$this->setInterFin($data['inter_fin']);
    }
}
