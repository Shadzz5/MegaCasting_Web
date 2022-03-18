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
     * @ORM\Column(name="Identifiant", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_Organisation", type="string", length=100, nullable=true)
     */
    private $nomOrganisation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse_Organisation", type="string", length=100, nullable=true)
     */
    private $adresseOrganisation;

    /**
     * @var int
     *
     * @ORM\Column(name="Code_Postal", type="integer", nullable=false)
     */
    private $codePostal;

    /**
     * @var int
     *
     * @ORM\Column(name="Numero_Telephone", type="integer", nullable=false)
     */
    private $numeroTelephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse_Email", type="string", length=100, nullable=true)
     */
    private $adresseEmail;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getNomOrganisation(): ?string
    {
        return $this->nomOrganisation;
    }

    public function setNomOrganisation(?string $nomOrganisation): self
    {
        $this->nomOrganisation = $nomOrganisation;

        return $this;
    }

    public function getAdresseOrganisation(): ?string
    {
        return $this->adresseOrganisation;
    }

    public function setAdresseOrganisation(?string $adresseOrganisation): self
    {
        $this->adresseOrganisation = $adresseOrganisation;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(int $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    public function getAdresseEmail(): ?string
    {
        return $this->adresseEmail;
    }

    public function setAdresseEmail(?string $adresseEmail): self
    {
        $this->adresseEmail = $adresseEmail;

        return $this;
    }


}
