<?php

namespace App\Entity;

use App\Constantes\Map\MapSize;
use App\Repository\MapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapRepository::class)]
class Map
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(enumType: MapSize::class)]
    private ?MapSize $size = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column]
    private ?bool $dlc = null;

    /**
     * @var Collection<int, CampaignMission>
     */
    #[ORM\ManyToMany(targetEntity: CampaignMission::class, mappedBy: 'related_maps')]
    private Collection $campaignMissions;

    public function __construct()
    {
        $this->campaignMissions = new ArrayCollection();
    }

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

    public function getSize(): ?MapSize
    {
        return $this->size;
    }

    public function setSize(MapSize $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function isDlc(): ?bool
    {
        return $this->dlc;
    }

    public function setDlc(bool $dlc): static
    {
        $this->dlc = $dlc;

        return $this;
    }

    /**
     * @return Collection<int, CampaignMission>
     */
    public function getCampaignMissions(): Collection
    {
        return $this->campaignMissions;
    }

    public function addCampaignMission(CampaignMission $campaignMission): static
    {
        if (!$this->campaignMissions->contains($campaignMission)) {
            $this->campaignMissions->add($campaignMission);
            $campaignMission->addRelatedMap($this);
        }

        return $this;
    }

    public function removeCampaignMission(CampaignMission $campaignMission): static
    {
        if ($this->campaignMissions->removeElement($campaignMission)) {
            $campaignMission->removeRelatedMap($this);
        }

        return $this;
    }
}
