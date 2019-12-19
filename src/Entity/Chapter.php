<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChapterRepository")
 */
class Chapter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Multimedia", mappedBy="chapter")
     */
    private $multimedia;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Content", mappedBy="chapter")
     */
    private $contents;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $planet_image;

    public function __construct()
    {
        $this->multimedia = new ArrayCollection();
        $this->contents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Multimedia[]
     */
    public function getMultimedia(): Collection
    {
        return $this->multimedia;
    }

    public function addMultimedia(Multimedia $multimedia): self
    {
        if (!$this->multimedia->contains($multimedia)) {
            $this->multimedia[] = $multimedia;
            $multimedia->setChapter($this);
        }

        return $this;
    }

    public function removeMultimedia(Multimedia $multimedia): self
    {
        if ($this->multimedia->contains($multimedia)) {
            $this->multimedia->removeElement($multimedia);
            // set the owning side to null (unless already changed)
            if ($multimedia->getChapter() === $this) {
                $multimedia->setChapter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Content[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Content $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setChapter($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->contains($content)) {
            $this->contents->removeElement($content);
            // set the owning side to null (unless already changed)
            if ($content->getChapter() === $this) {
                $content->setChapter(null);
            }
        }

        return $this;
    }

    public function getPlanetImage(): ?string
    {
        return $this->planet_image;
    }

    public function setPlanetImage(?string $planet_image): self
    {
        $this->planet_image = $planet_image;

        return $this;
    }
}
