<?php

namespace App\DataFixtures;

use App\Entity\Professionnel;
use App\Factory\ProfessionnelFactory;
use App\Repository\SéanceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfessionelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ProfessionnelFactory::createMany(50);

        ProfessionnelFactory::createOne([
            'login' => 'pro',
            'password' => 'test',
            'nom' => 'pro',
        ]);
    }
}
