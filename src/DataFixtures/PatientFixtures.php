<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\PatientFactory;
use App\Factory\ProfessionnelFactory;
use App\Factory\SeanceFactory;
use App\Factory\UserFactory;
use App\Repository\SeanceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\PropertyFactory;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

    }
}
