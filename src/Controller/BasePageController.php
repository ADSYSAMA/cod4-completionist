<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BasePageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('base_page.html.twig', [
            'title' => 'Cod4 Completionist',
            'body' => 'todo.',
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('base_page.html.twig', [
            'title' => 'About',
            'body' => 'todo.',
        ]);
    }
}
