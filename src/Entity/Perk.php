<?php

namespace App\Entity;

use App\Constantes\Perk\PerkCategory;
use App\Repository\PerkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerkRepository::class)]
class Perk
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $unlock_level = null;

    #[ORM\Column(enumType: PerkCategory::class)]
    private ?PerkCategory $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUnlockLevel(): ?int
    {
        return $this->unlock_level;
    }

    public function setUnlockLevel(int $unlock_level): static
    {
        $this->unlock_level = $unlock_level;

        return $this;
    }

    public function getCategory(): ?PerkCategory
    {
        return $this->category;
    }

    public function setCategory(PerkCategory $category): static
    {
        $this->category = $category;

        return $this;
    }
}
