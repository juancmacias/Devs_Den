<?php

namespace App\Repository;

use App\Entity\JobPositions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JobPositions>
 *
 * @method JobPositions|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobPositions|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobPositions[]    findAll()
 * @method JobPositions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobPositionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobPositions::class);
    }

//    /**
//     * @return JobPositions[] Returns an array of JobPositions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JobPositions
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
