<?php

namespace Clients\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="FK_association17", columns={"Ent_nom"})})
 * @ORM\Entity
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=254, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=254, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime", nullable=true)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="numPassport", type="string", length=254, nullable=true)
     */
    private $numpassport;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=254, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=254, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="autres", type="string", length=254, nullable=true)
     */
    private $autres;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="string", length=254, nullable=true)
     */
    private $remarques;

    /**
     * @var string
     *
     * @ORM\Column(name="numPermis", type="string", length=254, nullable=false)
     */
    private $numpermis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDelPermis", type="date", nullable=true)
     */
    private $datedelpermis;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=254, nullable=false)
     */
    private $adresse;

    /**
     * @var \Clients\\Entity\Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Clients\\Entity\Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ent_nom", referencedColumnName="nom")
     * })
     */
    private $entNom;


}
