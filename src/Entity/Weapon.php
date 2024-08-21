<?php

namespace App\Entity;

use App\Constantes\Weapon\PerkCategory;
use App\Constantes\Weapon\WeaponCategory;
use App\Constantes\Weapon\WeaponType;
use App\Repository\WeaponRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
class Weapon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $unlock_level = null;

    #[ORM\Column(enumType: WeaponType::class)]
    private ?WeaponType $type = null;

    #[ORM\Column(enumType: WeaponCategory::class)]
    private ?WeaponCategory $category = null;

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

    public function getType(): ?WeaponType
    {
        return $this->type;
    }

    public function setType(WeaponType $type): static
    {
        $this->type = $type;

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
