<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->setUserPasssword($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->setUserPasssword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }


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
            TextField::new('password')
                ->onlyOnForms()
                ->setFormType(PasswordType::class)
                ->setRequired(false)
                ->setEmptyData('')
                ->setFormTypeOption('attr', ['autocomplete' => 'new-password']),

        ];
    }

    public function setUserPasssword(User $user): void
    {
        $password = $this->getContext()->getRequest()->request->all()['User']['password'];
        if ('' != $password) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $password);
            $user->setPassword($hashedPassword);
        }
    }

}
