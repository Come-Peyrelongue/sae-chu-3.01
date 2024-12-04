<?php

namespace App\DataFixtures;

use App\Factory\PatientFactory;
use App\Factory\SéanceFactory;
use App\Repository\SéanceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PatientFactory::createMany(50);

        $patient = PatientFactory::createOne([
            'nom' => 'user',
            'prenom' => 'test',
            'login' => 'user',
            'password' => 'test',
        ]);

//        SéanceRepository::class->find('1')->setPatient($patient);

//        $manager->persist($patient);
    }
}
