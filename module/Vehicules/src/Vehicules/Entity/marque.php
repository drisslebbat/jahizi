<?php

namespace Vehicules\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marque
 *
 * @ORM\Table(name="marque", uniqueConstraints={@ORM\UniqueConstraint(name="MARQUE_PK", columns={"idMarq"})})
 * @ORM\Entity
 */
class Marque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMarq", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmarq;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=true)
     */
    private $annee;
	/**
	 * @return the $idmarq
	 */
	public function getIdmarq() {
		return $this->idmarq;
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
	 * @param number $idmarq
	 */
	public function setIdmarq($idmarq) {
		$this->idmarq = $idmarq;
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

	public function populate($data,$marque) {
		$this->setAnnee($data['annee']) ;
		$this->setNom($data['nom']) ;
		return $this ;}
   public function getArrayCopy()
		{
			return get_object_vars($this);
		}
}
