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
        SeanceFactory::createMany(10);

        $patient = $this->patientRepository->findOneBylogin('user');
        $professionnel = $this->professionnelRepository->findOneBylogin('pro');

        SeanceFactory::createOne([
            'date' => new \DateTime('2024/01/01'),
            'heureDebut' => new \DateTime('2024/01/01 11:00:00'),
            'patient' => $patient,
            'professionnel' => $professionnel,
        ]);
        SeanceFactory::createOne([
            'date' => new \DateTime('2024/01/01'),
            'heureDebut' => new \DateTime('2024/01/01 14:00:00'),
            'patient' => $patient,
            'professionnel' => $professionnel,
        ]);
        SeanceFactory::createOne([
            'date' => new \DateTime('2024/01/01'),
            'heureDebut' => new \DateTime('2024/01/01 9:00:00'),
            'patient' => $patient,
            'professionnel' => $professionnel,
            'note' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor convallis volutpat. Nunc.',
            'type' => 'consultation'
        ]);


    }

    public function getDependencies(): array
    {
        return [
            PatientFixtures::class,
            ProfessionelFixtures::class,
        ];
    }


}
