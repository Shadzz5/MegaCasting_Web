<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Artiste
 *
 * @ORM\Table(name="Artiste", indexes={@ORM\Index(name="IDX_53BA0CD3EB49C4C1", columns={"identifiantCivilite"})})
 * @ORM\Entity
 */
class Artiste implements UserInterface, PasswordAuthenticatedUserInterface
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
    #[Assert\NotBlank(
        message: 'Le champ nom est obligatoire',
    )]
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    #[Assert\NotBlank(
        message: 'Le champ prénom est obligatoire',
    )]
    private $prenom;
    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=100, nullable=true)
     */
    private $cv;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
     */
    private $datenaissance;
    /**
     * @var bool
     *
     * @ORM\Column(name="verification", type="boolean", nullable=false)
     */
    private $verification;
    /**
     * @var \Civilite
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantCivilite", referencedColumnName="identifiant",nullable=false)
     * })
     */
    private $identifiantCivilite;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreDeCasting", inversedBy="identifiantArtiste")
     * @ORM\JoinTable(name="ArtisteOffre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="identifiantArtiste", referencedColumnName="identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="identifiantOffre", referencedColumnName="identifiant")
     *   }
     * )
     */
    private $offreDeCasing;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->offreDeCasing = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

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

    public function getIdentifiantCivilite(): ?Civilite
    {
        return $this->identifiantCivilite;
    }

    public function setIdentifiantcivilite(?Civilite $identifiantcivilite): self
    {
        $this->identifiantCivilite = $identifiantcivilite;

        return $this;
    }

    /**
     * @return Collection<int, OffreDeCasting>
     */
    public function getOffre(): Collection
    {
        return $this->offreDeCasing;
    }

    public function addIdentifiantoffre(OffreDeCasting $identifiantoffre): self
    {
        if (!$this->offreDeCasing->contains($identifiantoffre)) {
            $this->offreDeCasing[] = $identifiantoffre;
        }

        return $this;
    }

    public function removeOffre(OffreDeCasting $identifiantoffre): self
    {
        $this->offreDeCasing->removeElement($identifiantoffre);

        return $this;
    }

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];
    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Assert\NotBlank(
        message: 'Le champ email est obligatoire',
    )]
    #[Assert\Email(
        message: 'la valeur {{ value }} n\'est pas une email',
    )]
    private $email;

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFullName()
    {
        return $this->prenom . " " . $this->nom;
    }
}
