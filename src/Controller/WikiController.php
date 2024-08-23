<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WikiController extends AbstractController
{
    #[Route('/wiki/weapons', name: 'wiki_weapons')]
    public function wiki_weapons(): Response
    {
        return $this->render('wiki/weapons.html.twig', [
            'title' => 'Weapons',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/attachments', name: 'wiki_attachments')]
    public function wiki_attachments(): Response
    {
        return $this->render('wiki/attachments.html.twig', [
            'title' => 'Attachments',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/lethals', name: 'wiki_lethals')]
    public function wiki_lethals(): Response
    {
        return $this->render('wiki/lethals.html.twig', [
            'title' => 'Lethals',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/tacticals', name: 'wiki_tacticals')]
    public function wiki_tacticals(): Response
    {
        return $this->render('wiki/tacticals.html.twig', [
            'title' => 'Tacticals',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/perks', name: 'wiki_perks')]
    public function wiki_perks(): Response
    {
        return $this->render('wiki/perks.html.twig', [
            'title' => 'Perks',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/streaks', name: 'wiki_streaks')]
    public function wiki_streaks(): Response
    {
        return $this->render('wiki/streaks.html.twig', [
            'title' => 'Streaks',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/maps', name: 'wiki_maps')]
    public function wiki_maps(): Response
    {
        return $this->render('wiki/maps.html.twig', [
            'title' => 'Maps',
            'weapons' => [],
        ]);
    }

    #[Route('/wiki/campaign-missions', name: 'wiki_campaign_missions')]
    public function wiki_campaign_missions(): Response
    {
        return $this->render('wiki/campaign_missions.html.twig', [
            'title' => 'Campaign Missions',
            'weapons' => [],
        ]);
    }
}
