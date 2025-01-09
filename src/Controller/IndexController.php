<?php

namespace App\Controller;

use App\Repository\ProfessionnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/search', name: 'app_index')]
    public function search(Request $request, ProfessionnelRepository $professionnelRepository): Response
    {
        $search = $request->query->get('search', '');

        $results = [];

        if (!empty($search)) {
            $results = $professionnelRepository->createQueryBuilder('p')
                ->where('p.nom LIKE :search')
                ->orWhere('p.prenom LIKE :search')
                ->setParameter('search', '%'.$search.'%')
                ->getQuery()
                ->getResult();
        }

        return $this->render('index/search_results.html.twig', [
            'results' => $results,
            'search' => $search,
        ]);
    }
}
