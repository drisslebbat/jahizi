<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie", uniqueConstraints={@ORM\UniqueConstraint(name="CATEGORIE_PK", columns={"idCat"})})
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var string
     *
     * @ORM\Column(name="idCat", type="string", length=250, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcat;

    /**
     * @var float
     *
     * @ORM\Column(name="prixCat", type="float", nullable=true)
     */
    private $prixcat;



    /**
     * Get idcat
     *
     * @return string 
     */
    public function getIdcat()
    {
        return $this->idcat;
    }
    /**
     * Set idcat
     *
     * @param string $idcat
     * @return Categorie
     */
    public function setIdcat($idcat)
    {
    	$this->idcat = $idcat;
    
    	return $this;
    }

    /**
     * Set prixcat
     *
     * @param float $prixcat
     * @return Categorie
     */
    public function setPrixcat($prixcat)
    {
        $this->prixcat = $prixcat;

        return $this;
    }

    /**
     * Get prixcat
     *
     * @return string 
     */
    public function getPrixcat()
    {
        return $this->prixcat;
    }
    public function populate($data) {
    	$this->setIdcat($data['idcat']) ;
    	$this->setPrixcat($data['prixcat']);
    
    }
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
}
