<?php

namespace App\DataFixtures;

use App\Factory\SeanceFactory;
use App\Repository\PatientRepository;
use App\Repository\ProfessionnelRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeanceFixture extends Fixture
{
    private PatientRepository $patientRepository;
    private ProfessionnelRepository $professionnelRepository;

    public function __construct(
        PatientRepository $patientRepository,
        ProfessionnelRepository $professionnelRepository
    ) {
        $this->patientRepository = $patientRepository;
        $this->professionnelRepository = $professionnelRepository;
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
