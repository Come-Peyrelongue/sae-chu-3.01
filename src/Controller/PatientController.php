<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatientController extends AbstractController
{
    #[Route('/patient', name: 'app_patient')]
    public function index(
        Security          $security,
        PatientRepository $patientRepository,
        SeanceRepository  $seanceRepository
    ): Response {
        if (!$security->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }

        $login = $security->getUser()->getLogin();
        $patient = $patientRepository->findOneBylogin($login);
        $seances = $seanceRepository->findByPatient($patient);
        $seancesPasse = $seanceRepository->findByPatientPasse($patient);
        $seancesFutur = $seanceRepository->findByPatientFutur($patient);

        $a = [];
        foreach ($seances as $seance) {
            $a[] = $seance->getProfessionnel();
        }

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'login' => $login,
            'seances' => $seances,
            'seancesPasse' => $seancesPasse,
            'seancesFutur' => $seancesFutur,
            'a' => $a,
        ]);
    }
}
