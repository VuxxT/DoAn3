<?php

namespace App\Repository;

use App\Entity\HocSinh;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HocSinh>
 *
 * @method HocSinh|null find($id, $lockMode = null, $lockVersion = null)
 * @method HocSinh|null findOneBy(array $criteria, array $orderBy = null)
 * @method HocSinh[]    findAll()
 * @method HocSinh[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HocSinhRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HocSinh::class);
    }

//    /**
//     * @return HocSinh[] Returns an array of HocSinh objects
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

//    public function findOneBySomeField($value): ?HocSinh
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
