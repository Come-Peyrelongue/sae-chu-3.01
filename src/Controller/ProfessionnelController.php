<?php

namespace App\Controller;

use App\Repository\ProfessionnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionnelController extends AbstractController
{
    #[Route('/professionnel', name: 'app_professionnel')]
    public function index(
        Security $security,
        ProfessionnelRepository $professionnelRepository,
    ): Response {
        $login = $security->getUser()->getLogin();
        $pro = $professionnelRepository->findOneBylogin($login);

        return $this->render('professionnel/index.html.twig', [
            'pro' => $pro,
            'controller_name' => 'ProfessionnelController',
        ]);
    }
}
