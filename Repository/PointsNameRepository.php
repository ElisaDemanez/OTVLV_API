<?php

namespace App\Repository;

use App\Entity\PointsName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PointsName|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointsName|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointsName[]    findAll()
 * @method PointsName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointsNameRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PointsName::class);
    }

//    /**
//     * @return PointsName[] Returns an array of PointsName objects
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
    public function findOneBySomeField($value): ?PointsName
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
