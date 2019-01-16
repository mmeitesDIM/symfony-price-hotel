<?php

namespace App\Repository;

use App\Entity\PrivateRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PrivateRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateRoom[]    findAll()
 * @method PrivateRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateRoomRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, PrivateRoom::class);
    }

    // /**
    //  * @return PrivateRoom[] Returns an array of PrivateRoom objects
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
    public function findOneBySomeField($value): ?PrivateRoom
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
