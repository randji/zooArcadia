<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $species = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diet = null;

    #[ORM\Column(nullable: true)]
    private ?float $quantity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: Habitat::class, inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Habitat $habitat = null;

    #[ORM\OneToOne(mappedBy: 'animal', targetEntity: VeterinaryReport::class, cascade: ['persist', 'remove'])]
    private ?VeterinaryReport $veterinaryReport = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(?string $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getDiet(): ?string
    {
        return $this->diet;
    }

    public function setDiet(?string $diet): static
    {
        $this->diet = $diet;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getHabitat(): ?Habitat
    {
        return $this->habitat;
    }

    public function setHabitat(?Habitat $habitat): self
    {
        $this->habitat = $habitat;
        return $this;
    }
    public function getVeterinaryReport(): ?VeterinaryReport
    {
        return $this->veterinaryReport;
    }

    public function setVeterinaryReport(?VeterinaryReport $veterinaryReport): self
    {
        // unset the owning side of the relation if necessary
        if ($veterinaryReport === null && $this->veterinaryReport !== null) {
            $this->veterinaryReport->setAnimal(null);
        }

        // set the owning side of the relation if necessary
        if ($veterinaryReport !== null && $veterinaryReport->getAnimal() !== $this) {
            $veterinaryReport->setAnimal($this);
        }

        $this->veterinaryReport = $veterinaryReport;
        return $this;
    }
}
