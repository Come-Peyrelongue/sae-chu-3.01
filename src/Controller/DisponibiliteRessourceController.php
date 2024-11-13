<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisponibiliteRessourceController extends AbstractController
{
    #[Route('/disponibilite/ressource', name: 'app_disponibilite_ressource')]
    public function index(): Response
    {
        return $this->render('disponibilite_ressource/index.html.twig', [
            'controller_name' => 'DisponibiliteRessourceController',
        ]);
    }
}
