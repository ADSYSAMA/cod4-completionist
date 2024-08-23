<?php

namespace App\Entity;

use App\Repository\StreakRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StreakRepository::class)]
class Streak
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $unlock_level = null;

    #[ORM\Column]
    private ?int $unlock_nb_kills = null;

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

    public function getUnlockNbKills(): ?int
    {
        return $this->unlock_nb_kills;
    }

    public function setUnlockNbKills(int $unlock_nb_kills): static
    {
        $this->unlock_nb_kills = $unlock_nb_kills;

        return $this;
    }
}
