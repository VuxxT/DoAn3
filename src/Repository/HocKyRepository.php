<?php

namespace App\Repository;

use App\Entity\HocKy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HocKy>
 *
 * @method HocKy|null find($id, $lockMode = null, $lockVersion = null)
 * @method HocKy|null findOneBy(array $criteria, array $orderBy = null)
 * @method HocKy[]    findAll()
 * @method HocKy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HocKyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HocKy::class);
    }

//    /**
//     * @return HocKy[] Returns an array of HocKy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HocKy
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
