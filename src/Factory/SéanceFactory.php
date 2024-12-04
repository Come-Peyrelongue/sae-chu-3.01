<?php

namespace App\Factory;

use App\Entity\Séance;
use App\Repository\SéanceRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Séance>
 *
 * @method        Séance|Proxy                              create(array|callable $attributes = [])
 * @method static Séance|Proxy                              createOne(array $attributes = [])
 * @method static Séance|Proxy                              find(object|array|mixed $criteria)
 * @method static Séance|Proxy                              findOrCreate(array $attributes)
 * @method static Séance|Proxy                              first(string $sortedField = 'id')
 * @method static Séance|Proxy                              last(string $sortedField = 'id')
 * @method static Séance|Proxy                              random(array $attributes = [])
 * @method static Séance|Proxy                              randomOrCreate(array $attributes = [])
 * @method static SéanceRepository|ProxyRepositoryDecorator repository()
 * @method static Séance[]|Proxy[]                          all()
 * @method static Séance[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Séance[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Séance[]|Proxy[]                          findBy(array $attributes)
 * @method static Séance[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Séance[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class SéanceFactory extends PersistentProxyObjectFactory
{
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
        return Séance::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'Date' => self::faker()->dateTime(),
            'HeureDébut' => null, // TODO add TIME type manually
            'HeureFin' => null, // TODO add TIME type manually
            'SéanceID' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Séance $séance): void {})
        ;
    }
}
