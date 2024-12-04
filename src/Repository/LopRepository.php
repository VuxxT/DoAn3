<?php

namespace App\Repository;

use App\Entity\Lop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lop>
 *
 * @method Lop|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lop|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lop[]    findAll()
 * @method Lop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lop::class);
    }

//    /**
//     * @return Lop[] Returns an array of Lop objects
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

//    public function findOneBySomeField($value): ?Lop
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
