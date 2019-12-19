<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $good_answer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $second_false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $third_false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Quizz", inversedBy="questions")
     */
    private $quizz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getGoodAnswer(): ?string
    {
        return $this->good_answer;
    }

    public function setGoodAnswer(string $good_answer): self
    {
        $this->good_answer = $good_answer;

        return $this;
    }

    public function getFirstFalse(): ?string
    {
        return $this->first_false;
    }

    public function setFirstFalse(string $first_false): self
    {
        $this->first_false = $first_false;

        return $this;
    }

    public function getSecondFalse(): ?string
    {
        return $this->second_false;
    }

    public function setSecondFalse(?string $second_false): self
    {
        $this->second_false = $second_false;

        return $this;
    }

    public function getThirdFalse(): ?string
    {
        return $this->third_false;
    }

    public function setThirdFalse(?string $third_false): self
    {
        $this->third_false = $third_false;

        return $this;
    }

    public function getQuizz(): ?Quizz
    {
        return $this->quizz;
    }

    public function setQuizz(?Quizz $quizz): self
    {
        $this->quizz = $quizz;

        return $this;
    }
}
