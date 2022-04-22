<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * OffreDeCasting
 *
 * @ORM\Table(name="OffreDeCasting", indexes={@ORM\Index(name="IDX_2421F0682B868BAA", columns={"identifiantMetier"}), @ORM\Index(name="IDX_2421F068D58D8CC9", columns={"identifiantOrganisation"}), @ORM\Index(name="IDX_2421F0681ACEB4D9", columns={"identifiantTypeContrat"})})
 * @ORM\Entity(repositoryClass="App\Repository\OffreDeCastingRepository")
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
    private $metier;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantOrganisation", referencedColumnName="identifiant", nullable=false)
     * })
     */
    private $organisation;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantTypeContrat", referencedColumnName="identifiant", nullable=false)
     * })
     */
    private $typeContrat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", mappedBy="offreDeCasing")
     */
    private $artiste;

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

    public function getMetier(): ?Metier
    {
        return $this->metier;
    }

    public function setMetier(?Metier $identifiantMetier): self
    {
        $this->metier = $identifiantMetier;

        return $this;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organisation $identifiantorganisation): self
    {
        $this->organisation = $identifiantorganisation;

        return $this;
    }

    public function getTypeContrat(): TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $identifianttypecontrat): self
    {
        $this->typeContrat = $identifianttypecontrat;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getArtiste(): Collection
    {
        return $this->artiste;
    }

    public function addArtiste(Artiste $identifiantartiste): self
    {
        if (!$this->artiste->contains($identifiantartiste)) {
            $this->artiste[] = $identifiantartiste;
            $identifiantartiste->addOffre($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $identifiantartiste): self
    {
        if ($this->artiste->removeElement($identifiantartiste)) {
            $identifiantartiste->removeOffre($this);
        }

        return $this;
    }
}
