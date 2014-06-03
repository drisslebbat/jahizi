<?php

namespace Autorisation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Autorisation;

/**
 * Droit
 *
 * @ORM\Table(name="droit", indexes={@ORM\Index(name="idClass", columns={"idClass"}), @ORM\Index(name="idAgent", columns={"idAgent"})})
 * @ORM\Entity
 */
class Droit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAgent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idagent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="droit_create", type="boolean", nullable=false)
     */
    private $droitCreate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="droit_read", type="boolean", nullable=false)
     */
    private $droitRead;

    /**
     * @var boolean
     *
     * @ORM\Column(name="droit_update", type="boolean", nullable=false)
     */
    private $droitUpdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="droit_delete", type="boolean", nullable=false)
     */
    private $droitDelete;

    /**
     * @var \Autorisation\Entity\Ressource
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Autorisation\Entity\Ressource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClass", referencedColumnName="idClass")
     * })
     */
    private $idclass;



    /**
     * Set idagent
     *
     * @param integer $idagent
     * @return Droit
     */
    public function setIdagent($idagent)
    {
        $this->idagent = $idagent;
    
        return $this;
    }

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
     * Set droitCreate
     *
     * @param boolean $droitCreate
     * @return Droit
     */
    public function setDroitCreate($droitCreate)
    {
        $this->droitCreate = $droitCreate;
    
        return $this;
    }

    /**
     * Get droitCreate
     *
     * @return boolean 
     */
    public function getDroitCreate()
    {
        return $this->droitCreate;
    }

    /**
     * Set droitRead
     *
     * @param boolean $droitRead
     * @return Droit
     */
    public function setDroitRead($droitRead)
    {
        $this->droitRead = $droitRead;
    
        return $this;
    }

    /**
     * Get droitRead
     *
     * @return boolean 
     */
    public function getDroitRead()
    {
        return $this->droitRead;
    }

    /**
     * Set droitUpdate
     *
     * @param boolean $droitUpdate
     * @return Droit
     */
    public function setDroitUpdate($droitUpdate)
    {
        $this->droitUpdate = $droitUpdate;
    
        return $this;
    }

    /**
     * Get droitUpdate
     *
     * @return boolean 
     */
    public function getDroitUpdate()
    {
        return $this->droitUpdate;
    }

    /**
     * Set droitDelete
     *
     * @param boolean $droitDelete
     * @return Droit
     */
    public function setDroitDelete($droitDelete)
    {
        $this->droitDelete = $droitDelete;
    
        return $this;
    }

    /**
     * Get droitDelete
     *
     * @return boolean 
     */
    public function getDroitDelete()
    {
        return $this->droitDelete;
    }

    /**
     * Set idclass
     *
     * @param \Autorisation\Entity\Ressource $idclass
     * @return Droit
     */
    public function setIdclass(\Autorisation\Entity\Ressource $idclass)
    {
        $this->idclass = $idclass;
    
        return $this;
    }

    /**
     * Get idclass
     *
     * @return \Autorisation\Entity\Ressource 
     */
    public function getIdclass()
    {
        return $this->idclass;
    }
    public function initialiseDroits( $agent, $classe)
    {
    	$this->setIdagent($agent->getIdagent());
    	$this->setIdclass($classe);
    	$this->setDroitCreate(false);
    	$this->setDroitUpdate(false);
    	$this->setDroitRead(false);
    	$this->setDroitDelete(false);
    }
}
