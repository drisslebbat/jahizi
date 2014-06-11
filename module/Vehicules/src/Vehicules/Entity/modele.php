<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 *
 * @ORM\Table(name="modele", uniqueConstraints={@ORM\UniqueConstraint(name="MODELE_PK", columns={"idMod"})}, indexes={@ORM\Index(name="FK_MODELE_A_MARQUE", columns={"idMarq"})})
 * @ORM\Entity
 */
class Modele
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMod", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmod;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var \Vehicules\Entity\Marque
     *
     * @ORM\ManyToOne(targetEntity="Vehicules\Entity\Marque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMarq", referencedColumnName="idMarq")
     * })
     */
    private $idmarq;
	/**
	 * @return the $idmod
	 */
	public function getIdmod() {
		return $this->idmod;
	}

	/**
	 * @return the $nom
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * @return the $annee
	 */
	public function getAnnee() {
		return $this->annee;
	}

	/**
	 * @return the $idmarq
	 */
	public function getIdmarq() {
		return $this->idmarq;
	}

	/**
	 * @param number $idmod
	 */
	public function setIdmod($idmod) {
		$this->idmod = $idmod;
	}

	/**
	 * @param string $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

	/**
	 * @param number $annee
	 */
	public function setAnnee($annee) {
		$this->annee = $annee;
	}

	/**
	 * @param \Vehicules\Entity\Marque $idmarq
	 */
	public function setIdmarq($idmarq) {
		$this->idmarq = $idmarq;
	}
	public function populate($data,$marque) {
		$this->setAnnee($data['annee']) ;
		$this->setNom($data['nom']) ;
		$this->setIdmarq($marque);
		return $this ;
		 
	}
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}


}
