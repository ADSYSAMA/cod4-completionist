<?php

namespace App\Controller\Challenges;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CamouflagesController extends AbstractController
{
    #[Route('/challenges/camouflages', name: 'challenges_camouflages')]
    public function challenges_camouflages(): Response
    {
        return $this->render('challenges/camouflages.html.twig', [
            'title' => 'Camouflages',
            'camouflages' => [],
        ]);
    }
}
