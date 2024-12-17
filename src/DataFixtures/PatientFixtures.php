<?php

namespace App\DataFixtures;

use App\Factory\PatientFactory;
use App\Factory\SeanceFactory;
use App\Repository\SeanceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $patient = PatientFactory::createOne([
            'nom' => 'user',
            'prenom' => 'test',
            'login' => 'user',
        ]);
    }
}
