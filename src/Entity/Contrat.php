<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="Contrat", indexes={@ORM\Index(name="IDX_AF89A00FA6EDA21B", columns={"Identifiant_Type_Contrat"})})
 * @ORM\Entity
 */
class Contrat
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
     * @ORM\Column(name="Intitule_Contrat", type="string", length=100, nullable=false)
     */
    private $intituleContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=16, nullable=false)
     */
    private $description;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Type_Contrat", referencedColumnName="Identifiant")
     * })
     */
    private $typeContrat;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getIntituleContrat(): ?string
    {
        return $this->intituleContrat;
    }

    public function setIntituleContrat(string $intituleContrat): self
    {
        $this->intituleContrat = $intituleContrat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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


}
