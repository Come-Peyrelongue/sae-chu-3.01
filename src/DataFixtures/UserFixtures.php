<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'nom' => 'PEYRELONGUE',
            'login' => 'Come',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'nom' => 'RAYAUME',
            'login' => 'Hugo',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'nom' => 'DUPONT',
            'login' => 'Enzo',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'nom' => 'LINDEN',
            'login' => 'ThomasL',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'nom' => 'PAZZE',
            'login' => 'ThomasP',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'nom' => 'lastname',
            'login' => 'user',
            'roles' => ['ROLE_USER'],
            'password' => 'test',
        ]);

        for ($i = 0; $i < 10; ++$i) {
            UserFactory::createOne([
                'roles' => ['ROLE_USER'],
            ]);
        }

        $manager->flush();
    }
}
