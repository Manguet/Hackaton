<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanetRepository")
 */
class Planet
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_done;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_half;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_off;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="planets")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quizz", mappedBy="planet")
     */
    private $quizzs;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->quizzs = new ArrayCollection();
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

    public function getIsDone(): ?bool
    {
        return $this->is_done;
    }

    public function setIsDone(?bool $is_done): self
    {
        $this->is_done = $is_done;

        return $this;
    }

    public function getIsHalf(): ?bool
    {
        return $this->is_half;
    }

    public function setIsHalf(?bool $is_half): self
    {
        $this->is_half = $is_half;

        return $this;
    }

    public function getIsOff(): ?bool
    {
        return $this->is_off;
    }

    public function setIsOff(?bool $is_off): self
    {
        $this->is_off = $is_off;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Quizz[]
     */
    public function getQuizzs(): Collection
    {
        return $this->quizzs;
    }

    public function addQuizz(Quizz $quizz): self
    {
        if (!$this->quizzs->contains($quizz)) {
            $this->quizzs[] = $quizz;
            $quizz->setPlanet($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): self
    {
        if ($this->quizzs->contains($quizz)) {
            $this->quizzs->removeElement($quizz);
            // set the owning side to null (unless already changed)
            if ($quizz->getPlanet() === $this) {
                $quizz->setPlanet(null);
            }
        }

        return $this;
    }
}
