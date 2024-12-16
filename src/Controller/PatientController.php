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
        SeanceRepository  $séanceRepository): Response
    {
        if (!$security->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }

        $login = $security->getUser()->getLogin();
        $patient = $patientRepository->findOneBylogin($login);
        $seances = $séanceRepository->findByPatient($patient);
        $a = [];
        foreach ($seances as $seance) {
            array_push($a, $seance->getProfessionnel());
        }

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
            'login' => $login,
            'seances' => $seances,
            'a' => $a,
        ]);
    }
}
