<?php

namespace App\Repository;

use App\Entity\FullHouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FullHouse|null find($id, $lockMode = null, $lockVersion = null)
 * @method FullHouse|null findOneBy(array $criteria, array $orderBy = null)
 * @method FullHouse[]    findAll()
 * @method FullHouse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FullHouseRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, FullHouse::class);
    }

    // /**
    //  * @return FullHouse[] Returns an array of FullHouse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FullHouse
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
