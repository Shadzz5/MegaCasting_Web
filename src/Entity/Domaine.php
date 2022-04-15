<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Domaine
 *
 * @ORM\Table(name="Domaine")
 * @ORM\Entity
 */
class Domaine
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PartenaireDiffusion", mappedBy="identifiantDomaine")
     */
    private $identifiantPartenaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantpartenaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    /**
     * @return Collection<int, Partenairediffusion>
     */
    public function getIdentifiantPartenaire(): Collection
    {
        return $this->identifiantPartenaire;
    }

    public function addidentifiantPartenaire(Partenairediffusion $identifiantPartenaire): self
    {
        if (!$this->identifiantPartenaire->contains($identifiantPartenaire)) {
            $this->identifiantPartenaire[] = $identifiantPartenaire;
            $identifiantPartenaire->addIdentifiantdomaine($this);
        }

        return $this;
    }

    public function removeIdentifiantpartenaire(Partenairediffusion $identifiantpartenaire): self
    {
        if ($this->identifiantpartenaire->removeElement($identifiantPartenaire)) {
            $identifiantPartenaire->removeIdentifiantdomaine($this);
        }

        return $this;
    }
}
