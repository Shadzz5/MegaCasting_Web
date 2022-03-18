<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artiste
 *
 * @ORM\Table(name="Artiste", indexes={@ORM\Index(name="IDX_53BA0CD330B2325D", columns={"IdCivilite"})})
 * @ORM\Entity
 */
class Artiste
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
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CV", type="string", length=100, nullable=true)
     */
    private $cv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var bool
     *
     * @ORM\Column(name="Verification", type="boolean", nullable=false)
     */
    private $verification;

    /**
     * @var \Civilite
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdCivilite", referencedColumnName="Identifiant")
     * })
     */
    private $civilite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreDeCasting", inversedBy="identifiantArtiste")
     * @ORM\JoinTable(name="artiste_offre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Artiste", referencedColumnName="Identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Offre", referencedColumnName="Identifiant")
     *   }
     * )
     */
    private $Offre_de_castings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantOffre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Offre_de_castings = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getVerification(): ?bool
    {
        return $this->verification;
    }

    public function setVerification(bool $verification): self
    {
        $this->verification = $verification;

        return $this;
    }

    public function getCivilite(): ?Civilite
    {
        return $this->civilite;
    }

    public function setCivilite(?Civilite $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * @return Collection<int, OffreDeCasting>
     */
    public function getOffreDeCastings(): Collection
    {
        return $this->Offre_de_castings;
    }

    public function addOffreDeCasting(OffreDeCasting $offreDeCasting): self
    {
        if (!$this->Offre_de_castings->contains($offreDeCasting)) {
            $this->Offre_de_castings[] = $offreDeCasting;
        }

        return $this;
    }

    public function removeOffreDeCasting(OffreDeCasting $offreDeCasting): self
    {
        $this->Offre_de_castings->removeElement($offreDeCasting);

        return $this;
    }

}
