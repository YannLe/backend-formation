<?php

namespace App\Repository;

use App\Entity\Allegeance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Allegeance>
 *
 * @method Allegeance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allegeance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allegeance[]    findAll()
 * @method Allegeance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllegeanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allegeance::class);
    }

//    /**
//     * @return Allegeance[] Returns an array of Allegeance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Allegeance
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
