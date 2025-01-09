<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningController extends AbstractController
{
    #[Route('/planning', name: 'app_planning')]
    public function index(
        Security $security,
        SeanceRepository $seanceRepository
    ): Response {
        if (!$security->isGranted('ROLE_PRO')) {
            return $this->redirectToRoute('app_login');
        }

        $login = $security->getUser()->getLogin();
        $events = $seanceRepository->findByProfessionnelLogin($login);

        $rdvs = [];

        foreach ($events as $event) {
            $startDateTime = $event->getDate()->format('Y-m-d') . 'T' . $event->getHeureDebut()->format('H:i:s');
            $endDateTime = $event->getDate()->format('Y-m-d') . 'T' . $event->getHeureFin()->format('H:i:s');

            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $startDateTime,
                'end' => $endDateTime,
                'title' => $event->getRaison(),
                'description' => $event->getNote(),
            ];
        }

        $data = json_encode($rdvs);

        return $this->render('planning/index.html.twig', compact('data'));
    }

    #[Route('/planning/admin', name: 'app_planning_admin')]
    public function indexAdmin(
        Security $security,
        SeanceRepository $seanceRepository
    ): Response {
        if (!$security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_login');
        }

        $events = $seanceRepository->findAll();

        $rdvs = [];

        foreach ($events as $event) {
            $startDateTime = $event->getDate()->format('Y-m-d') . 'T' . $event->getHeureDebut()->format('H:i:s');
            $endDateTime = $event->getDate()->format('Y-m-d') . 'T' . $event->getHeureFin()->format('H:i:s');

            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $startDateTime,
                'end' => $endDateTime,
                'title' => $event->getRaison(),
                'description' => $event->getNote(),
            ];
        }

        $data = json_encode($rdvs);

        return $this->render('planning/index.html.twig', compact('data'));
    }
}
