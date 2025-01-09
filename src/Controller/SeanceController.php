<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Form\SeanceType;
use App\Repository\ProfessionnelRepository;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/seance')]
class SeanceController extends AbstractController
{
    #[Route('/', name: 'app_seance')]
    public function index(Security $security,
                          SeanceRepository $seanceRepository)
    : Response
    {
        if (!$security->isGranted('ROLE_PRO')) {
            return $this->redirectToRoute('app_login');
        }

        $login = $this->getUser()->getUserIdentifier();
        $seances = $seanceRepository->findByProfessionnelLogin($login);

        return $this->render('seance/index.html.twig', [
            'seances' => $seances,
        ]);
    }

    #[Route('/admin', name: 'app_seance_admin')]
    public function indexAdmin(Security $security,
                               SeanceRepository $seanceRepository)
    : Response
    {
        if (!$security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_login');
        }

        $seances = $seanceRepository->findAll();

        return $this->render('seance/index.html.twig', [
            'seances' => $seances,
        ]);
    }

    #[Route('/new', name: 'app_seance_new', methods: ['GET', 'POST'])]
    public function new(Security $security, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$security->isGranted('ROLE_PRO') AND !$security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_login');
        }

        $seance = new Seance();
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seance);
            $entityManager->flush();

            return $this->redirectToRoute('app_seance');
        }

        return $this->render('seance/new.html.twig', [
            'seance' => $seance,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_seance_show', methods: ['GET'])]
    public function show(Security $security, Seance $seance): Response
    {
        if (!$security->isGranted('ROLE_PRO') AND !$security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('seance/show.html.twig', [
            'seance' => $seance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_seance_edit', methods: ['GET','POST'])]
    public function edit(Security $security, Request $request, Seance $seance, EntityManagerInterface $entityManager): Response
    {
        if (!$security->isGranted('ROLE_PRO') AND !$security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_seance_show', ['id' => $seance->getId()]);
        }

        return $this->render('seance/edit.html.twig', [
            'seance' => $seance,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/contact/{id}/delete', name: 'app_seance_delete', requirements: ['id' => '\d+'])]
    public function delete(Security $security, Request $request, Seance $seance, EntityManagerInterface $entityManager): Response
    {
        if (!$security->isGranted('ROLE_PRO') AND !$security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_seance_delete', ['id' => $seance->getId()]))
            ->setMethod('POST')
            ->add('cancel', SubmitType::class, [
                'label' => 'Annuler',
                'attr' => ['class' => 'btn btn-secondary'],
            ])
            ->add('delete', SubmitType::class, [
                'label' => 'Supprimer',
                'attr' => ['class' => 'btn btn-danger'],
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->get('delete')->isClicked()) {
                $entityManager->remove($seance);
                $entityManager->flush();

                return $this->redirectToRoute('app_seance');
            }

            if ($form->get('cancel')->isClicked()) {
                return $this->redirectToRoute('app_seance_show', ['id' => $seance->getId()]);
            }
        }

        return $this->render('seance/delete.html.twig', [
            'form' => $form->createView(),
            'seance' => $seance,
        ]);
    }



}
