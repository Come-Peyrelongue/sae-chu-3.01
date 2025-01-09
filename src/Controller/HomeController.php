<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/chu', name: 'app_chu')]
    public function chu(): Response
    {
        return $this->render('chu/chu.html.twig');
    }

    #[Route('/infos-pratiques', name: 'app_infos_pratiques')]
    public function infosPratiques(): Response
    {
        return $this->render('infos_pratiques/infos_pratiques.html.twig');
    }

    #[Route('/nous-rejoindre', name: 'app_nous_rejoindre')]
    public function nousRejoindre(): Response
    {
        return $this->render('nous_rejoindre/nous_rejoindre.html.twig');
    }

}
