<?php

namespace App\DataFixtures;

use App\Entity\Professionnel;
use App\Factory\ProfessionnelFactory;
use App\Repository\SeanceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfessionelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ProfessionnelFactory::createOne([
            'login' => 'pro',
            'password' => 'test',
            'nom' => 'pro',
        ]);

        ProfessionnelFactory::createMany(50);
    }
}
