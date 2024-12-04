<?php

namespace App\Repository;

use App\Entity\Diem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Diem>
 *
 * @method Diem|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diem|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diem[]    findAll()
 * @method Diem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diem::class);
    }

//    /**
//     * @return Diem[] Returns an array of Diem objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Diem
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
