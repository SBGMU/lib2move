<?php

namespace App\Repository;

use App\Entity\PrixLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PrixLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrixLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrixLocation[]    findAll()
 * @method PrixLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrixLocationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PrixLocation::class);
    }

    // /**
    //  * @return PrixLocation[] Returns an array of PrixLocation objects
    //  */
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
    public function findOneBySomeField($value): ?PrixLocation
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
