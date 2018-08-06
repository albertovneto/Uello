<?php

namespace App\Repository;

use App\Entity\Geocoding;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geocoding|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geocoding|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geocoding[]    findAll()
 * @method Geocoding[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeocodingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geocoding::class);
    }

//    /**
//     * @return Geocoding[] Returns an array of Geocoding objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geocoding
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
