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
        $dateDebut = self::faker()->dateTimeBetween('-1 day', '+1 month');

        $heuresFixes = [
            '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
            '11:00', '11:30', '12:00', '12:30', '13:00', '13:30',
            '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'
        ];

        $heureDebut = self::faker()->randomElement($heuresFixes);

        $formattedDateDebut = $dateDebut->format('Y-m-d') . ' ' . $heureDebut;

        $dateDebut = \DateTime::createFromFormat('Y-m-d H:i', $formattedDateDebut, $dateDebut->getTimezone());

        $dureeSeance = self::faker()->numberBetween(15, 60);
        $heureFin = clone $dateDebut;
        $heureFin->modify("+{$dureeSeance} minutes");

        return [
            'date' => $dateDebut,
            'heureDebut' => new \DateTime('2000-1-1 '.self::faker()->time()),
            'heureFin' => new \DateTime('2000-1-1 '.self::faker()->time()),
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
