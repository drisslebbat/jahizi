<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nationalite
 *
 *
 * @ORM\Table(name="nationalite")
 * @ORM\Entity
 */
class Nationalite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="libellee", type="string", length=254, nullable=true)
     */
    private $libellee;



    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libellee
     *
     * @param string $libellee
     * @return Nationalite
     */
    public function setLibellee($libellee)
    {
        $this->libellee = $libellee;
    
        return $this;
    }

    /**
     * Get libellee
     *
     * @return string 
     */
    public function getLibellee()
    {
        return $this->libellee;
    }
}
