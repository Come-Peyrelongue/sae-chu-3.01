<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisponibiliteProfessionnelController extends AbstractController
{
    #[Route('/disponibilite/professionnel', name: 'app_disponibilite_professionnel')]
    public function index(): Response
    {
        return $this->render('disponibilite_professionnel/index.html.twig', [
            'controller_name' => 'DisponibiliteProfessionnelController',
        ]);
    }
}
