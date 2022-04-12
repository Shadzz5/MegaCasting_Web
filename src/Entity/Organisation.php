<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organisation
 *
 * @ORM\Table(name="Organisation")
 * @ORM\Entity
 */
class Organisation
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
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostal", type="integer", nullable=false)
     */
    private $codepostal;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroTelephone", type="integer", nullable=false)
     */
    private $numerotelephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresseEmail", type="string", length=100, nullable=true)
     */
    private $adresseemail;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getNumerotelephone(): ?int
    {
        return $this->numerotelephone;
    }

    public function setNumerotelephone(int $numerotelephone): self
    {
        $this->numerotelephone = $numerotelephone;

        return $this;
    }

    public function getAdresseemail(): ?string
    {
        return $this->adresseemail;
    }

    public function setAdresseemail(?string $adresseemail): self
    {
        $this->adresseemail = $adresseemail;

        return $this;
    }


}
