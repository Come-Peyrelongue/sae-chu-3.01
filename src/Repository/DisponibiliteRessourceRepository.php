<?php

namespace App\Repository;

use App\Entity\DisponibiliteRessource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DisponibiliteRessource>
 *
 * @method DisponibiliteRessource|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisponibiliteRessource|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisponibiliteRessource[]    findAll()
 * @method DisponibiliteRessource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisponibiliteRessourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DisponibiliteRessource::class);
    }

//    /**
//     * @return DisponibiliteRessource[] Returns an array of DisponibiliteRessource objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DisponibiliteRessource
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
