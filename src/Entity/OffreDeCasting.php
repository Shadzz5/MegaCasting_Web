<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OffreDeCasting
 *
 * @ORM\Table(name="OffreDeCasting", indexes={@ORM\Index(name="IDX_2421F0682B868BAA", columns={"identifiantMetier"}), @ORM\Index(name="IDX_2421F068D58D8CC9", columns={"identifiantOrganisation"}), @ORM\Index(name="IDX_2421F0681ACEB4D9", columns={"identifiantTypeContrat"})})
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
     *   @ORM\JoinColumn(name="identifiantMetier", referencedColumnName="identifiant", nullable=false)
     * })
     */
    private $identifiantMetier;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantOrganisation", referencedColumnName="identifiant", nullable=false)
     * })
     */
    private $identifiantOrganisation;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantTypeContrat", referencedColumnName="identifiant", nullable=false)
     * })
     */
    private $identifiantTypeContrat;

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

    public function getIdentifiantMetier(): Metier
    {
        return $this->identifiantMetier;
    }

    public function setIdentifiantMetier(?Metier $identifiantMetier): self
    {
        $this->identifiantMetier = $identifiantMetier;

        return $this;
    }

    public function getIdentifiantOrganisation(): ?Organisation
    {
        return $this->identifiantOrganisation;
    }

    public function setIdentifiantOrganisation(?Organisation $identifiantorganisation): self
    {
        $this->identifiantOrganisation = $identifiantorganisation;

        return $this;
    }

    public function getIdentifiantTypeContrat(): ?TypeContrat
    {
        return $this->identifiantTypeContrat;
    }

    public function setIdentifiantTypeContrat(?TypeContrat $identifianttypecontrat): self
    {
        $this->identifiantTypeContrat = $identifianttypecontrat;

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
