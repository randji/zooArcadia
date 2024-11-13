<?php

namespace App\Entity;

use App\Repository\VeterinaryReportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeterinaryReportRepository::class)]
class VeterinaryReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $animal_statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $food = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $food_weight = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $detailStatut = null;

    #[ORM\OneToOne(inversedBy: 'veterinaryReport', targetEntity: Animal::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimalStatut(): ?string
    {
        return $this->animal_statut;
    }

    public function setAnimalStatut(?string $animal_statut): static
    {
        $this->animal_statut = $animal_statut;

        return $this;
    }

    public function getFood(): ?string
    {
        return $this->food;
    }

    public function setFood(?string $food): static
    {
        $this->food = $food;

        return $this;
    }

    public function getFoodWeight(): ?string
    {
        return $this->food_weight;
    }

    public function setFoodWeight(?string $food_weight): static
    {
        $this->food_weight = $food_weight;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDetailStatut(): ?string
    {
        return $this->detailStatut;
    }

    public function setDetailStatut(?string $detailStatut): static
    {
        $this->detailStatut = $detailStatut;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(Animal $animal): static
    {
        $this->animal = $animal;
        return $this;
    }
}
