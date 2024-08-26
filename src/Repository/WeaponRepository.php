<?php

namespace App\Repository;

use App\Entity\Weapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Weapon>
 */
class WeaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Weapon::class);
    }

    public function findWeaponsByTypeAndCategory(): array
    {
        $weapons = [];
        $allWeapons = $this->findBy([], ['unlock_level' => 'ASC']);

        foreach ($allWeapons as $weapon) {
            $weapons[$weapon->getType()->value][$weapon->getCategory()->value][] = $weapon;
        }

        return $weapons;
    }
}
