<?php

namespace App\Repository;

use App\Entity\DisponibiliteProfessionnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DisponibiliteProfessionnel>
 *
 * @method DisponibiliteProfessionnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisponibiliteProfessionnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisponibiliteProfessionnel[]    findAll()
 * @method DisponibiliteProfessionnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisponibiliteProfessionnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DisponibiliteProfessionnel::class);
    }

//    /**
//     * @return DisponibiliteProfessionnel[] Returns an array of DisponibiliteProfessionnel objects
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

//    public function findOneBySomeField($value): ?DisponibiliteProfessionnel
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
