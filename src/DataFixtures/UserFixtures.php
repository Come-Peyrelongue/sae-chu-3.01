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
            'firstname' => 'Come',
            'lastname' => 'PEYRELONGUE',
            'login' => 'Come',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'firstname' => 'Hugo',
            'lastname' => 'RAYAUME',
            'login' => 'Hugo',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'firstname' => 'Enzo',
            'lastname' => 'DUPONT',
            'login' => 'Enzo',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'firstname' => 'Thomas',
            'lastname' => 'LINDEN',
            'login' => 'ThomasL',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'firstname' => 'Thomas',
            'lastname' => 'PAZZE',
            'login' => 'ThomasP',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'test',
        ]);

        UserFactory::createOne([
            'firstname' => 'firstname',
            'lastname' => 'lastname',
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
