<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomMedia = null;

    #[ORM\Column(length: 50)]
    private ?string $urlMedia = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Article $article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedia(): ?string
    {
        return $this->nomMedia;
    }

    public function setNomMedia(string $nomMedia): self
    {
        $this->nomMedia = $nomMedia;

        return $this;
    }

    public function getUrlMedia(): ?string
    {
        return $this->urlMedia;
    }

    public function setUrlMedia(string $urlMedia): self
    {
        $this->urlMedia = $urlMedia;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
