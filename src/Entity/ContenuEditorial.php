<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenuEditorial
 *
 * @ORM\Table(name="ContenuEditorial")
 * @ORM\Entity
 */
class ContenuEditorial
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
     * @ORM\Column(name="ficheMetier", type="string", length=100, nullable=false)
     */
    private $fichemetier;

    /**
     * @var string
     *
     * @ORM\Column(name="conseil", type="string", length=100, nullable=false)
     */
    private $conseil;

    /**
     * @var string
     *
     * @ORM\Column(name="interviews", type="string", length=100, nullable=false)
     */
    private $interviews;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text", length=16, nullable=false)
     */
    private $article;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getFichemetier(): ?string
    {
        return $this->fichemetier;
    }

    public function setFichemetier(string $fichemetier): self
    {
        $this->fichemetier = $fichemetier;

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
