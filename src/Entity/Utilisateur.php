<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="Utilisateur")
 * @ORM\Entity
 */
class Utilisateur
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
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motDePasse", type="string", length=50, nullable=true)
     */
    private $motdepasse;

    /**
     * @var bool
     *
     * @ORM\Column(name="acces", type="boolean", nullable=false)
     */
    private $acces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="date", nullable=false)
     */
    private $dateajout;

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

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(?string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getAcces(): ?bool
    {
        return $this->acces;
    }

    public function setAcces(bool $acces): self
    {
        $this->acces = $acces;

        return $this;
    }

    public function getDateajout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateajout(\DateTimeInterface $dateajout): self
    {
        $this->dateajout = $dateajout;

        return $this;
    }
}
