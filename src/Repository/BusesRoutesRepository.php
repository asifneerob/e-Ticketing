<?php

namespace App\Repository;

use App\Entity\BusesRoutes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BusesRoutes|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusesRoutes|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusesRoutes[]    findAll()
 * @method BusesRoutes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusesRoutesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusesRoutes::class);
    }

    // /**
    //  * @return BusesRoutes[] Returns an array of BusesRoutes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BusesRoutes
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
