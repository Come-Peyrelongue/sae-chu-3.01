<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SéanceController extends AbstractController
{
    #[Route('/s/ance', name: 'app_s_ance')]
    public function index(): Response
    {
        return $this->render('séance/index.html.twig', [
            'controller_name' => 'SéanceController',
        ]);
    }
}
