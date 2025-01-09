<?php

namespace App\Repository;

use App\Entity\Seance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Seance>
 *
 * @method Seance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seance[]    findAll()
 * @method Seance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seance::class);
    }

    /**
     * @return Seance[] Returns an array of Seance objects
     */
    public function findByProfesionnel($value): array
    {
        return $this->createQueryBuilder('seance')
            ->andWhere('seance.professionnel = :val')
            ->setParameter('val', $value)
            ->orderBy('seance.date', 'ASC')
            ->addOrderBy('seance.heureDebut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByProfessionnelLogin(string $login): array
    {
        return $this->createQueryBuilder('s')
            ->join('s.professionnel', 'p')
            ->andWhere('p.login = :login')
            ->setParameter('login', $login)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Seance[] Returns an array of Seance objects
     */
    public function findByPatient($value): array
    {
        return $this->createQueryBuilder('seance')
            ->andWhere('seance.patient = :val')
            ->setParameter('val', $value)
            ->orderBy('seance.date', 'ASC')
            ->addOrderBy('seance.heureDebut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Seance[] Returns an array of Seance objects
     */
    public function findByPatientPasse($value): array
    {
        return $this->createQueryBuilder('seance')
            ->andWhere('seance.patient = :val')
            ->andWhere('seance.date < CURRENT_TIMESTAMP()')
            ->setParameter('val', $value)
            ->orderBy('seance.date', 'ASC')

            ->getQuery()
            ->getResult();
    }

    /**
     * @return Seance[] Returns an array of Seance objects
     */
    public function findByPatientFutur($value): array
    {
        return $this->createQueryBuilder('seance')
            ->andWhere('seance.patient = :val')
            ->andWhere('seance.date > CURRENT_TIMESTAMP()')
            ->setParameter('val', $value)
            ->orderBy('seance.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
