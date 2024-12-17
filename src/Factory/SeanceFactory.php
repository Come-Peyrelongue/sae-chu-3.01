<?php

namespace App\Factory;

use App\Entity\Seance;
use App\Repository\SeanceRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Seance>
 *
 * @method        Seance|Proxy                              create(array|callable $attributes = [])
 * @method static Seance|Proxy                              createOne(array $attributes = [])
 * @method static Seance|Proxy                              find(object|array|mixed $criteria)
 * @method static Seance|Proxy                              findOrCreate(array $attributes)
 * @method static Seance|Proxy                              first(string $sortedField = 'id')
 * @method static Seance|Proxy                              last(string $sortedField = 'id')
 * @method static Seance|Proxy                              random(array $attributes = [])
 * @method static Seance|Proxy                              randomOrCreate(array $attributes = [])
 * @method static SeanceRepository|ProxyRepositoryDecorator repository()
 * @method static Seance[]|Proxy[]                          all()
 * @method static Seance[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Seance[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Seance[]|Proxy[]                          findBy(array $attributes)
 * @method static Seance[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Seance[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class SeanceFactory extends PersistentProxyObjectFactory
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
        return Seance::class;
    }

    // @todo type = consultation, suivi, urgence...
    // @todo note = note que pourrais laisser le médecin

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'Date' => self::faker()->dateTimeBetween('-7 days', '+7 days'),
            'HeureDebut' => new \DateTime('2000-1-1 '.self::faker()->time()),
            'HeureFin' => new \DateTime('2000-1-1 '.self::faker()->time()),
            'SéanceID' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Seance $séance): void {})
        ;
    }
}
