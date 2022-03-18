<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OffreDeCasting
 *
 * @ORM\Table(name="Offre_de_Casting", indexes={@ORM\Index(name="IDX_18DFA917DBAD1978", columns={"Identifiant_Domaine"}), @ORM\Index(name="IDX_18DFA917EFB3CDEE", columns={"Identifiant_Metier"}), @ORM\Index(name="IDX_18DFA917C7A45F55", columns={"Identifiant_Organisation"}), @ORM\Index(name="IDX_18DFA917A6EDA21B", columns={"Identifiant_Type_Contrat"})})
 * @ORM\Entity
 */
class OffreDeCasting
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
     * @ORM\Column(name="Intitule_Offre", type="string", length=255, nullable=false)
     */
    private $intituleOffre;

    /**
     * @var int
     *
     * @ORM\Column(name="Reference_Offre", type="integer", nullable=false)
     */
    private $referenceOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Domaine", referencedColumnName="Identifiant")
     * })
     */
    private $domaine;

    /**
     * @var \Metier
     *
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Metier", referencedColumnName="Identifiant")
     * })
     */
    private $metier;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Organisation", referencedColumnName="Identifiant")
     * })
     */
    private $organisation;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Type_Contrat", referencedColumnName="Identifiant")
     * })
     */
    private $typeContrat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", mappedBy="identifiantOffre")
     */
    private $artiste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ListeReferenciel", mappedBy="identifiantOffre")
     */
    private $liste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PartenaireDiffusion", mappedBy="identifiantOffre")
     */
    private $partenaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantArtiste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identifiantListe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identifiantPartenaire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->artiste = new ArrayCollection();
        $this->liste = new ArrayCollection();
        $this->partenaire = new ArrayCollection();
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getIntituleOffre(): ?string
    {
        return $this->intituleOffre;
    }

    public function setIntituleOffre(string $intituleOffre): self
    {
        $this->intituleOffre = $intituleOffre;

        return $this;
    }

    public function getReferenceOffre(): ?int
    {
        return $this->referenceOffre;
    }

    public function setReferenceOffre(int $referenceOffre): self
    {
        $this->referenceOffre = $referenceOffre;

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

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getMetier(): ?Metier
    {
        return $this->metier;
    }

    public function setMetier(?Metier $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organisation $organisation): self
    {
        $this->organisation = $organisation;

        return $this;
    }

    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getArtiste(): Collection
    {
        return $this->artiste;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artiste->contains($artiste)) {
            $this->artiste[] = $artiste;
            $artiste->addIdentifiantOffre($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artiste->removeElement($artiste)) {
            $artiste->removeIdentifiantOffre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ListeReferenciel>
     */
    public function getListe(): Collection
    {
        return $this->liste;
    }

    public function addListe(ListeReferenciel $liste): self
    {
        if (!$this->liste->contains($liste)) {
            $this->liste[] = $liste;
            $liste->addIdentifiantOffre($this);
        }

        return $this;
    }

    public function removeListe(ListeReferenciel $liste): self
    {
        if ($this->liste->removeElement($liste)) {
            $liste->removeIdentifiantOffre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PartenaireDiffusion>
     */
    public function getPartenaire(): Collection
    {
        return $this->partenaire;
    }

    public function addPartenaire(PartenaireDiffusion $partenaire): self
    {
        if (!$this->partenaire->contains($partenaire)) {
            $this->partenaire[] = $partenaire;
            $partenaire->addIdentifiantOffre($this);
        }

        return $this;
    }

    public function removePartenaire(PartenaireDiffusion $partenaire): self
    {
        if ($this->partenaire->removeElement($partenaire)) {
            $partenaire->removeIdentifiantOffre($this);
        }

        return $this;
    }

}
