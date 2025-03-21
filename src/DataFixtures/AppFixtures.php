<?php

namespace App\DataFixtures;

use App\Factory\PatientFactory;
use App\Factory\ProfessionnelFactory;
use App\Factory\SeanceFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * Fixtures généraux de l'application, chaque patient a au moins
     * 2 séances et chaque professionnel est affecté à au moins 1 seance.
     */
    public function load(ObjectManager $manager): void
    {
        $patients = PatientFactory::createMany(10);

        $professionnels = ProfessionnelFactory::createMany(5);

        foreach ($patients as $patient) {
            SeanceFactory::createMany(2, function () use ($patient, $professionnels) {
                return [
                    'patient' => $patient,
                    'professionnel' => $professionnels[array_rand($professionnels)],
                ];
            });
        }

        foreach ($professionnels as $professionnel) {
            SeanceFactory::createOne([
                'professionnel' => $professionnel,
                'patient' => $patients[array_rand($patients)],
            ]);
        }

        $patient = PatientFactory::createOne(['login' => 'user']);
        UserFactory::createOne(['password' => 'test', 'roles' => ['ROLE_USER']]);

        $pro = ProfessionnelFactory::createOne(['login' => 'pro']);
        UserFactory::createOne(['password' => 'test', 'roles' => ['ROLE_PRO']]);

        SeanceFactory::createMany(3, [
            'patient' => $patient,
            'professionnel' => $pro,
        ]);

        $manager->flush();
    }
}
