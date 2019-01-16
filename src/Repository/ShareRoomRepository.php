<?php

namespace App\Repository;

use App\Entity\ShareRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShareRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShareRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShareRoom[]    findAll()
 * @method ShareRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShareRoomRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, ShareRoom::class);
    }

    // /**
    //  * @return ShareRoom[] Returns an array of ShareRoom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShareRoom
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
