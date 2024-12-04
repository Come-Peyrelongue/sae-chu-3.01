<?php

namespace App\Repository;

use App\Entity\Séance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Séance>
 *
 * @method Séance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Séance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Séance[]    findAll()
 * @method Séance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SéanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Séance::class);
    }

//    /**
//     * @return Séance[] Returns an array of Séance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }
}
