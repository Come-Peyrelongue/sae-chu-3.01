<?php

namespace App\Controller\Admin;

use App\Entity\Seance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SeanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Seance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('patient')->formatValue(function ($value, $entity) {
                return $entity->getPatient() ? $entity->getPatient()->getLogin() : null;
            }),
            AssociationField::new('professionnel')->formatValue(function ($value, $entity) {
                return $entity->getProfessionnel() ? $entity->getProfessionnel()->getLogin() : null;
            }),
            DateField::new('date')->setFormat('dd/MM/YYYY'),
            DateField::new('heure_debut')->setFormat('HH:mm'),
            DateField::new('heure_fin')->setFormat('HH:mm'),
            TextField::new('note'),
            TextField::new('raison'),
        ];
    }
}
