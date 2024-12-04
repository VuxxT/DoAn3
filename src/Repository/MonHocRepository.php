<?php

namespace App\Repository;

use App\Entity\MonHoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MonHoc>
 *
 * @method MonHoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonHoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonHoc[]    findAll()
 * @method MonHoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonHocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonHoc::class);
    }

//    /**
//     * @return MonHoc[] Returns an array of MonHoc objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MonHoc
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
