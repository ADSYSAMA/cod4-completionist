<?php

namespace App\Repository;

use App\Entity\Map;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Map>
 */
class MapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Map::class);
    }

    public function findMapsGroup(): array
    {
        $weapons = [];
        $allWeapons = $this->findBy([], ['unlock_level' => 'ASC']);

        foreach ($allWeapons as $weapon) {
            $weapons[$weapon->getType()->value][$weapon->getCategory()->value][] = $weapon;
        }

        return $weapons;
    }
}
