<?php

namespace App\Factory;

use App\Entity\Professionnel;
use App\Repository\ProfessionnelRepository;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;
use Transliterator;

/**
 * @extends PersistentProxyObjectFactory<Professionnel>
 *
 * @method        Professionnel|Proxy create(array|callable $attributes = [])
 * @method static Professionnel|Proxy createOne(array $attributes = [])
 * @method static Professionnel|Proxy find(object|array|mixed $criteria)
 * @method static Professionnel|Proxy findOrCreate(array $attributes)
 * @method static Professionnel|Proxy first(string $sortedField = 'id')
 * @method static Professionnel|Proxy last(string $sortedField = 'id')
 * @method static Professionnel|Proxy random(array $attributes = [])
 * @method static Professionnel|Proxy randomOrCreate(array $attributes = [])
 * @method static ProfessionnelRepository|ProxyRepositoryDecorator repository()
 * @method static Professionnel[]|Proxy[] all()
 * @method static Professionnel[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Professionnel[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Professionnel[]|Proxy[] findBy(array $attributes)
 * @method static Professionnel[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Professionnel[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ProfessionnelFactory extends PersistentProxyObjectFactory{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    protected $transliterator;
    public function __construct()
    {
        $this->transliterator = Transliterator::create('Latin-ASCII');
    }

    public static function class(): string
    {
        return Professionnel::class;
    }

    protected function normalizeName(string $name): string
    {
        $normalized = $this->transliterator->transliterate($name);
        $normalized = preg_replace('/[^a-zA-Z0-9]+/', '-', $normalized);

        return strtolower($normalized);
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        $specialitesReeducation = [
            'Médecin rééducateur',
            'Kinésithérapeute',
            'Ergothérapeute',
            'Psychomotricien',
            'Orthophoniste',
            'Infirmier spécialisé',
            'Cardiologue',
            'Pneumologue',
            'Neurologue',
            'Nutritionniste/Diététicien',
            'Psychologue',
            'Orthoprothésiste',
            'Sage-femme',
            'Médecin du sport',
            'Technicien en appareillage',
            'Gériatre',
            'Urologue',
            'Rhumatologue',
            'Chirurgien orthopédiste',
            'Infirmier en rééducation',
        ];
        $lastName = self::faker()->lastName();
        $normalizedLastname = $this->normalizeName($lastName);
        $login = $normalizedLastname . self::faker()->numberBetween(0001,9999);
        $password = self::faker()->regexify('[A-Za-z0-9!@#$%^&*()_+=-]{12}');
        $specialities = self::faker()->randomElement($specialitesReeducation);


        return [
            'login' =>$login,
            'nom' => $normalizedLastname,
            'specialite' => $specialities
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (Professionnel $professionnel): void {
                UserFactory::createOne([
                    'roles' => ['ROLE_PRO'],
                    'nom' => $professionnel->getNom(),
                    'login' => $professionnel->getLogin(),
                ]);
            });
    }
}
