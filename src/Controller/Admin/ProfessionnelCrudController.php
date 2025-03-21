<?php

namespace App\Controller\Admin;

use App\Entity\Professionnel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProfessionnelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Professionnel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('specialite'),
            TextField::new('login'),
        ];
    }
}
