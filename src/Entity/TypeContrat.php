<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeContrat
 *
 * @ORM\Table(name="TypeContrat")
 * @ORM\Entity
 */
class TypeContrat
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
     * @ORM\Column(name="nomContrat", type="string", length=50, nullable=false)
     */
    private $nomcontrat;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getNomcontrat(): ?string
    {
        return $this->nomcontrat;
    }

    public function setNomcontrat(string $nomcontrat): self
    {
        $this->nomcontrat = $nomcontrat;

        return $this;
    }
}
