<?php


namespace App\Tests\Controller\Seance;

use App\Factory\SeanceFactory;
use App\Factory\ProfessionnelFactory;
use App\Factory\PatientFactory;

use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class IndexCest
{
    public function testSeanceOnPage(ControllerTester $I): void
    {
        $pro = UserFactory::createOne(['roles' => ['ROLE_PRO']])->_real();
        $I->amLoggedInAs($pro);
        $I->amOnPage('/seance/');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Liste des séances');

    }
    public function testNewSeance(ControllerTester $I): void
    {
        $pro = UserFactory::createOne(['roles' => ['ROLE_PRO']])->_real();
        $I->amLoggedInAs($pro);
        $I->amOnPage('/seance/new');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Créer une nouvelle séance');






    }
}
