<?php

namespace App\Repository;

use App\Entity\PointsPatate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PointsPatate|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointsPatate|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointsPatate[]    findAll()
 * @method PointsPatate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointsPatateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PointsPatate::class);
    }

//    /**
//     * @return PointsPatate[] Returns an array of PointsPatate objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PointsPatate
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
