<?php

namespace App\Repository;

use App\Entity\Perk;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Perk>
 */
class PerkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Perk::class);
    }

    public function findPerksByCategory(): array
    {
        $perks = [];
        $allPerks = $this->findBy([], [
            'unlock_level' => 'ASC',
            'category' => 'ASC',
        ]);

        foreach ($allPerks as $perk) {
            $perks[$perk->getCategory()->value][] = $perk;
        }

        return $perks;
    }
}
