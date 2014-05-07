<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * Set raisonsocial
     *
     * @param string $raisonsocial
     * @return Entreprise
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
     * @return Entreprise
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
     * @return Entreprise
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
}
