<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table(name="Metier", indexes={@ORM\Index(name="IDX_560C08BAAAD8A9B7", columns={"identifiantDomaine"})})
 * @ORM\Entity
 */
class Metier
{
    /**
     * @var int
     *
     * @ORM\Column(name="identifiant", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantDomaine", referencedColumnName="identifiant")
     * })
     */
    private $identifiantdomaine;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdentifiantdomaine(): ?Domaine
    {
        return $this->identifiantdomaine;
    }

    public function setIdentifiantdomaine(?Domaine $identifiantdomaine): self
    {
        $this->identifiantdomaine = $identifiantdomaine;

        return $this;
    }


}
