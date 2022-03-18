<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PartenaireDiffusion
 *
 * @ORM\Table(name="Partenaire_diffusion")
 * @ORM\Entity
 */
class PartenaireDiffusion
{
    /**
     * @var int
     *
     * @ORM\Column(name="Identifiant", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Libelle_Offre", type="string", length=100, nullable=true)
     */
    private $libelleOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle_Media", type="string", length=100, nullable=false)
     */
    private $libelleMedia;

    /**
     * @var bool
     *
     * @ORM\Column(name="Acces", type="boolean", nullable=false, options={"default"="1"})
     */
    private $acces = true;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreDeCasting", inversedBy="identifiantPartenaire")
     * @ORM\JoinTable(name="partenaire_offre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Partenaire", referencedColumnName="Identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Offre", referencedColumnName="Identifiant")
     *   }
     * )
     */
    private $offre_de_casting;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantOffre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offre_de_casting = new ArrayCollection();
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getLibelleOffre(): ?string
    {
        return $this->libelleOffre;
    }

    public function setLibelleOffre(?string $libelleOffre): self
    {
        $this->libelleOffre = $libelleOffre;

        return $this;
    }

    public function getLibelleMedia(): ?string
    {
        return $this->libelleMedia;
    }

    public function setLibelleMedia(string $libelleMedia): self
    {
        $this->libelleMedia = $libelleMedia;

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
     * @return Collection<int, OffreDeCasting>
     */
    public function getOffreDeCasting(): Collection
    {
        return $this->offre_de_casting;
    }

    public function addOffreDeCasting(OffreDeCasting $offreDeCasting): self
    {
        if (!$this->offre_de_casting->contains($offreDeCasting)) {
            $this->offre_de_casting[] = $offreDeCasting;
        }

        return $this;
    }

    public function removeOffreDeCasting(OffreDeCasting $offreDeCasting): self
    {
        $this->offre_de_casting->removeElement($offreDeCasting);

        return $this;
    }

}
