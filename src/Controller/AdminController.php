<?php

namespace App\Controller;

use App\Repository\ProfessionnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(
        Security $security,
        ProfessionnelRepository $professionnelRepository
    ): Response
    {
        $login = $security->getUser()->getLogin();
        $pro = $professionnelRepository->findOneBylogin($login);

        return $this->render('admin/index.html.twig', [
            'pro' => $pro,
            'controller_name' => 'ProfessionnelController',
        ]);
    }
}
