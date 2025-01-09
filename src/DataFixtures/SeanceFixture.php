<?php

namespace App\DataFixtures;

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
