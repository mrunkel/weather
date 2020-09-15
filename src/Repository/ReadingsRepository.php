<?php

namespace App\Repository;

use App\Entity\Readings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Readings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Readings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Readings[]    findAll()
 * @method Readings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReadingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Readings::class);
    }

    // /**
    //  * @return Readings[] Returns an array of Readings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Readings
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
