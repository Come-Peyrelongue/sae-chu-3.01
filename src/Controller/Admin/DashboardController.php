<?php

namespace App\Controller\Admin;

use App\Entity\Patient;
use App\Entity\Professionnel;
use App\Entity\Seance;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $admin = $this->getUser();

        return $this->render('admin/index.html.twig',[
            'admin' => $admin,
        ]);
    }

    #[Route('/admin/dashboard', name: 'admin_dashboard')]
    public function dashboard(): Response
    {
        $admin = $this->getUser();

        return $this->render('admin/dashboard.html.twig',[
            'admin' => $admin,
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration hôpital Sébastopol');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fa fa-users', User::class);
        yield MenuItem::linkToCrud('Professionnel', 'fa fa-user-nurse', Professionnel::class);
        yield MenuItem::linkToCrud('Patient', 'fa fa-user', Patient::class);
    }
}
