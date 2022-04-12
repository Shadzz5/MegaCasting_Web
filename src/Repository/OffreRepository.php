<?php

namespace App\Repository;

use App\Entity\OffreDeCasting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OffreDeCasting|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreDeCasting|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreDeCasting[]    findAll()
 * @method OffreDeCasting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffreDeCasting::class);
    }

    public function findByDomaine(int $value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.domaine = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    public function findByContrat(int $value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.TypeContrat = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

//    public function listByVerif(int $value)
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.dateDebut < NOW() = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getResult();
//    }
}
