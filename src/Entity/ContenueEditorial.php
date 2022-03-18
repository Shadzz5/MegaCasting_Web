<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenueEditorial
 *
 * @ORM\Table(name="Contenue_editorial")
 * @ORM\Entity
 */
class ContenueEditorial
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
     * @ORM\Column(name="Fiche_Metier", type="string", length=100, nullable=false)
     */
    private $ficheMetier;

    /**
     * @var string
     *
     * @ORM\Column(name="Conseil", type="string", length=100, nullable=false)
     */
    private $conseil;

    /**
     * @var string
     *
     * @ORM\Column(name="Interviews", type="string", length=100, nullable=false)
     */
    private $interviews;

    /**
     * @var string
     *
     * @ORM\Column(name="Article", type="text", length=16, nullable=false)
     */
    private $article;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getFicheMetier(): ?string
    {
        return $this->ficheMetier;
    }

    public function setFicheMetier(string $ficheMetier): self
    {
        $this->ficheMetier = $ficheMetier;

        return $this;
    }

    public function getConseil(): ?string
    {
        return $this->conseil;
    }

    public function setConseil(string $conseil): self
    {
        $this->conseil = $conseil;

        return $this;
    }

    public function getInterviews(): ?string
    {
        return $this->interviews;
    }

    public function setInterviews(string $interviews): self
    {
        $this->interviews = $interviews;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }


}
