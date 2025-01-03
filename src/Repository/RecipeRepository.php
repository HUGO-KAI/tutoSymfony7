<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function findTotalDuration(): int
    {
        return $this->createQueryBuilder('r')
            ->select('SUM(r.duration)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @return Recipe[] Returns an array of Recipe objects
     */
    public function findWithDurationLowerThan(int $duration): array
    {
        return $this->createQueryBuilder('r')
            ->select('r', 'c')
            ->where('r.duration <= :duration')
            ->orderBy('r.duration', 'ASC')
            ->leftJoin('r.category', 'c')
            ->setMaxResults(10)
            ->setParameter('duration', $duration)
            ->getQuery()
            ->getResult();
    }

    public function findByUserId($user): ?array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getArrayResult()
        ;
    }

    //    public function findOneBySomeField($value): ?Recipe
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
