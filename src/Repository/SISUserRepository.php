<?php

namespace App\Repository;

use App\Entity\SISUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SISUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SISUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SISUser[]    findAll()
 * @method SISUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SISUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SISUser::class);
    }

    // /**
    //  * @return SISUser[] Returns an array of SISUser objects
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
    public function findOneBySomeField($value): ?SISUser
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
