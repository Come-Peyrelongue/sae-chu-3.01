<?php

namespace App\DataFixtures;

use App\Factory\SeanceFactory;
use App\Repository\PatientRepository;
use App\Repository\ProfessionnelRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeanceFixture extends Fixture
{
    public function __construct(
    ) {

    }
    public function load(ObjectManager $manager): void
    {

    }

    public function getDependencies(): array
    {
        return [
            PatientFixtures::class,
            ProfessionelFixtures::class,
        ];
    }


}
