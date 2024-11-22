<?php

namespace App\Factory;

use App\Entity\Professionnel;
use App\Repository\ProfessionnelRepository;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

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
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Professionnel::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'Login' => self::faker()->text(30),
            'Nom' => self::faker()->text(40),
            'Password' => self::faker()->text(50),
            'ProfessionnelID' => self::faker()->randomNumber(),
            'Spécialité' => self::faker()->text(60),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Professionnel $professionnel): void {})
        ;
    }
}
