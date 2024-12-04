<?php

namespace App\Repository;

use App\Entity\LichHoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LichHoc>
 *
 * @method LichHoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method LichHoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method LichHoc[]    findAll()
 * @method LichHoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LichHocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LichHoc::class);
    }

//    /**
//     * @return LichHoc[] Returns an array of LichHoc objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LichHoc
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
