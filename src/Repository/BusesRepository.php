<?php

namespace App\Repository;

use App\Entity\Buses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Buses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Buses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Buses[]    findAll()
 * @method Buses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Buses::class);
    }

    // /**
    //  * @return Buses[] Returns an array of Buses objects
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
    public function findOneBySomeField($value): ?Buses
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
