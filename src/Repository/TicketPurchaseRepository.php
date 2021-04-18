<?php

namespace App\Repository;

use App\Entity\TicketPurchase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketPurchase|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketPurchase|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketPurchase[]    findAll()
 * @method TicketPurchase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketPurchaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketPurchase::class);
    }

    // /**
    //  * @return TicketPurchase[] Returns an array of TicketPurchase objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TicketPurchase
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
