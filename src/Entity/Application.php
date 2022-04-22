<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Application
{
    protected int $offreIdentifiant;
    #[Assert\NotBlank(
        message: 'Le champ nom est obligatoire',
    )]
    protected string $nom;
    #[Assert\NotBlank(
        message: 'Le champ prénom est obligatoire',
    )]
    protected string $prenom;
    #[Assert\NotBlank(
        message: 'Le champ email est obligatoire',
    )]
    #[Assert\Email(
        message: 'la valeur {{ value }} n\'est pas une email',
    )]
    protected string $email;
    protected string $motivation;
    protected string $sexe;
    protected \DateTime $applicationDate;
    protected \DateTime $dateAnniversaire;

    /**
     * @return int
     */
    public function getoffreIdentifiant(): int
    {
        return $this->offreIdentifiant;
    }

    /**
     * @param int $OffreIdentifiant
     */
    public function setOffreIdentifiant(int $OffreIdentifiant): void
    {
        $this->OffreIdentifiant = $OffreIdentifiant;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMotivation(): string
    {
        return $this->motivation;
    }

    /**
     * @param string $motivation
     */
    public function setMotivation(string $motivation): void
    {
        $this->motivation = $motivation;
    }

    /**
     * @return string
     */
    public function getSexe(): string
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe(string $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return \DateTime
     */
    public function getApplicationDate(): ?\DateTime
    {
        return $this->applicationDate;
    }

    /**
     * @param \DateTime $applicationDate
     */
    public function setApplicationDate(\DateTime $applicationDate): void
    {
        $this->applicationDate = $applicationDate;
    }

    /**
     * @return \DateTime
     */
    public function getDateAnniversaire(): \DateTime
    {
        return $this->dateAnniversaire;
    }

    /**
     * @param \DateTime $dateAnniversaire
     */
    public function setDateAnniversaire(\DateTime $dateAnniversaire): void
    {
        $this->dateAnniversaire = $dateAnniversaire;
    }
}
