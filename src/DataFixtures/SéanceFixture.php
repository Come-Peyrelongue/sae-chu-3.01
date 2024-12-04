<?php

namespace App\DataFixtures;

use App\Factory\SéanceFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SéanceFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        SéanceFactory::createMany(10);
    }
}
