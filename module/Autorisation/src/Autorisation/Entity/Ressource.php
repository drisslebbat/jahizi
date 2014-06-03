<?php

namespace Autorisation\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ressource
 *
 * @ORM\Table(name="ressource", uniqueConstraints={@ORM\UniqueConstraint(name="nomClass", columns={"nomClass"})})
 * @ORM\Entity
 */
class Ressource
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClass", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclass;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClass", type="string", length=40, nullable=false)
     */
    private $nomclass;



    /**
     * Get idclass
     *
     * @return integer 
     */
    public function getIdclass()
    {
        return $this->idclass;
    }

    /**
     * Set nomclass
     *
     * @param string $nomclass
     * @return Ressource
     */
    public function setNomclass($nomclass)
    {
        $this->nomclass = $nomclass;
    
        return $this;
    }

    /**
     * Get nomclass
     *
     * @return string 
     */
    public function getNomclass()
    {
        return $this->nomclass;
    }
}
