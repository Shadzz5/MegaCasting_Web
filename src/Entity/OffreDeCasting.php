<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Offredecasting
 *
 * @ORM\Table(name="OffredeCasting", indexes={@ORM\Index(name="IDX_2421F0682B868BAA", columns={"identifiantMetier"}), @ORM\Index(name="IDX_2421F068D58D8CC9", columns={"identifiantOrganisation"}), @ORM\Index(name="IDX_2421F0681ACEB4D9", columns={"identifiantTypeContrat"})})
 * @ORM\Entity
 */
class OffreDeCasting
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
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @var \Metier
     *
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantMetier", referencedColumnName="identifiant")
     * })
     */
    private $identifiantMetier;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantOrganisation", referencedColumnName="identifiant")
     * })
     */
    private $identifiantorganisation;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantTypeContrat", referencedColumnName="identifiant")
     * })
     */
    private $identifianttypecontrat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", mappedBy="identifiantoffre")
     */
    private $identifiantartiste;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantartiste = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getIdentifiantMetier(): ?Metier
    {
        return $this->identifiantMetier;
    }

    public function setIdentifiantmetier(?Metier $identifiantmetier): self
    {
        $this->identifiantmetier = $identifiantmetier;

        return $this;
    }

    public function getIdentifiantorganisation(): ?Organisation
    {
        return $this->identifiantorganisation;
    }

    public function setIdentifiantorganisation(?Organisation $identifiantorganisation): self
    {
        $this->identifiantorganisation = $identifiantorganisation;

        return $this;
    }

    public function getIdentifianttypecontrat(): ?TypeContrat
    {
        return $this->identifianttypecontrat;
    }

    public function setIdentifianttypecontrat(?TypeContrat $identifianttypecontrat): self
    {
        $this->identifianttypecontrat = $identifianttypecontrat;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getIdentifiantartiste(): Collection
    {
        return $this->identifiantartiste;
    }

    public function addIdentifiantartiste(Artiste $identifiantartiste): self
    {
        if (!$this->identifiantartiste->contains($identifiantartiste)) {
            $this->identifiantartiste[] = $identifiantartiste;
            $identifiantartiste->addIdentifiantoffre($this);
        }

        return $this;
    }

    public function removeIdentifiantartiste(Artiste $identifiantartiste): self
    {
        if ($this->identifiantartiste->removeElement($identifiantartiste)) {
            $identifiantartiste->removeIdentifiantoffre($this);
        }

        return $this;
    }

}
