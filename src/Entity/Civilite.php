<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Civilite
 *
 * @ORM\Table(name="Civilite")
 * @ORM\Entity
 */
class Civilite
{
    /**
     * @var int
     *
     * @ORM\Column(name="identifiant", type="integer", nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="nomCourt", type="string", length=10, nullable=false)
     */
    private $nomcourt;

    public function getIdentifiant(): ?int
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

    public function getNomcourt(): ?string
    {
        return $this->nomcourt;
    }

    public function setNomcourt(string $nomcourt): self
    {
        $this->nomcourt = $nomcourt;

        return $this;
    }
}
