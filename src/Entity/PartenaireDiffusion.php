<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PartenaireDiffusion
 *
 * @ORM\Table(name="PartenaireDiffusion")
 * @ORM\Entity
 */
class PartenaireDiffusion
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
     * @var string|null
     *
     * @ORM\Column(name="nomDomaine", type="string", length=100, nullable=true)
     */
    private $nomdomaine;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleMedia", type="string", length=100, nullable=false)
     */
    private $libellemedia;

    /**
     * @var bool
     *
     * @ORM\Column(name="acces", type="boolean", nullable=false, options={"default"="1"})
     */
    private $acces = true;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Domaine", inversedBy="identifiantPartenaire")
     * @ORM\JoinTable(name="PartenaireDomaine",
     *   joinColumns={
     *     @ORM\JoinColumn(name="identifiantPartenaire", referencedColumnName="identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="identifiantDomaine", referencedColumnName="identifiant")
     *   }
     * )
     */
    private $identifiantDomaine;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantDomaine = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getNomdomaine(): ?string
    {
        return $this->nomdomaine;
    }

    public function setNomdomaine(?string $nomdomaine): self
    {
        $this->nomdomaine = $nomdomaine;

        return $this;
    }

    public function getLibellemedia(): ?string
    {
        return $this->libellemedia;
    }

    public function setLibellemedia(string $libellemedia): self
    {
        $this->libellemedia = $libellemedia;

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

    /**
     * @return Collection<int, Domaine>
     */
    public function getIdentifiantDomaine(): Collection
    {
        return $this->identifiantDomaine;
    }

    public function addIdentifiantDomaine(Domaine $identifiantDomaine): self
    {
        if (!$this->identifiantDomaine->contains($identifiantDomaine)) {
            $this->identifiantDomaine[] = $identifiantDomaine;
        }

        return $this;
    }

    public function removeIdentifiantDomaine(Domaine $identifiantDomaine): self
    {
        $this->identifiantDomaine->removeElement($identifiantDomaine);

        return $this;
    }

}
