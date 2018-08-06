<?php

namespace App\Repository;

use App\Entity\PointsDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PointsDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointsDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointsDescription[]    findAll()
 * @method PointsDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointsDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PointsDescription::class);
    }

//    /**
//     * @return PointsDescription[] Returns an array of PointsDescription objects
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
    public function findOneBySomeField($value): ?PointsDescription
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
