<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->OnlyOnIndex(),
            TextField::new('login'),
            ArrayField::new('roles')
                ->formatValue(function ($value) {
                        if (in_array('ROLE_ADMIN',$value)) {
                            return'<i class="fa-solid fa-address-card"></i>';
                        } elseif (in_array('ROLE_PRO',$value)) {
                            return '<i class="fa fa-user"></i>';
                        } if (in_array('ROLE_USER',$value)) {
                            return '<i class="fa-solid fa-user-nurse"></i>';
                        } else {
                            return '';
                    }
                }),
        ];
    }
}
