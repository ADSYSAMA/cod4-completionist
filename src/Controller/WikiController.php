<?php

namespace App\Controller;

use App\Repository\AttachmentRepository;
use App\Repository\CampaignMissionRepository;
use App\Repository\LethalRepository;
use App\Repository\MapRepository;
use App\Repository\PerkRepository;
use App\Repository\StreakRepository;
use App\Repository\TacticalRepository;
use App\Repository\WeaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WikiController extends AbstractController
{
    public function __construct(
        private readonly WeaponRepository          $weaponRepository,
        private readonly AttachmentRepository      $attachmentRepository,
        private readonly LethalRepository          $lethalRepository,
        private readonly TacticalRepository        $tacticalRepository,
        private readonly PerkRepository            $perkRepository,
        private readonly StreakRepository          $streakRepository,
        private readonly MapRepository             $mapRepository,
        private readonly CampaignMissionRepository $campaignMissionRepository,
    )
    {
    }

    #[Route('/wiki/weapons', name: 'wiki_weapons')]
    public function wiki_weapons(): Response
    {
        $weapons = $this->weaponRepository->findWeaponsByTypeAndCategory();

        return $this->render('wiki/weapons.html.twig', [
            'title' => 'Weapons',
            'weapons' => $weapons,
        ]);
    }

    #[Route('/wiki/attachments', name: 'wiki_attachments')]
    public function wiki_attachments(): Response
    {
        $attachments = $this->attachmentRepository->findAll();

        return $this->render('wiki/attachments.html.twig', [
            'title' => 'Attachments',
            'attachments' => $attachments,
        ]);
    }

    #[Route('/wiki/lethals', name: 'wiki_lethals')]
    public function wiki_lethals(): Response
    {
        $lethals = $this->lethalRepository->findBy([], ['unlock_level' => 'ASC']);

        return $this->render('wiki/lethals.html.twig', [
            'title' => 'Lethals',
            'lethals' => $lethals,
        ]);
    }

    #[Route('/wiki/tacticals', name: 'wiki_tacticals')]
    public function wiki_tacticals(): Response
    {
        $tacticals = $this->tacticalRepository->findBy([], ['unlock_level' => 'ASC']);

        return $this->render('wiki/tacticals.html.twig', [
            'title' => 'Tacticals',
            'tacticals' => $tacticals,
        ]);
    }

    #[Route('/wiki/perks', name: 'wiki_perks')]
    public function wiki_perks(): Response
    {
        $perks = $this->perkRepository->findPerksByCategory();

        return $this->render('wiki/perks.html.twig', [
            'title' => 'Perks',
            'perks' => $perks,
        ]);
    }

    #[Route('/wiki/streaks', name: 'wiki_streaks')]
    public function wiki_streaks(): Response
    {
        $streaks = $this->streakRepository->findBy([], [
            'unlock_level' => 'ASC',
            'unlock_nb_kills' => 'ASC',
        ]);

        return $this->render('wiki/streaks.html.twig', [
            'title' => 'Streaks',
            'streaks' => $streaks,
        ]);
    }

    #[Route('/wiki/maps', name: 'wiki_maps')]
    public function wiki_maps(): Response
    {
        $maps = $this->mapRepository->findBy([], [
            'dlc' => 'ASC',
            'name' => 'ASC',
        ]);

        return $this->render('wiki/maps.html.twig', [
            'title' => 'Maps',
            'maps' => $maps,
        ]);
    }

    #[Route('/wiki/campaign-missions', name: 'wiki_campaign_missions')]
    public function wiki_campaign_missions(): Response
    {
        $missions = $this->campaignMissionRepository->findBy([], [
            'bonus_mission' => 'ASC',
            'number' => 'ASC',
        ]);

        return $this->render('wiki/campaign_missions.html.twig', [
            'title' => 'Campaign Missions',
            'campaign_missions' => $missions,
        ]);
    }
}
