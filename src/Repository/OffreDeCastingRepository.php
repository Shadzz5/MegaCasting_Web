<?php

namespace App\Repository;

use App\Entity\OffreDeCasting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;


class OffreDeCastingRepository extends EntityRepository
{

    public function findByDomaine(int $value)
    {
        return $this->getEntityManager()->createQuery("SELECT o, d, m FROM App\Entity\OffreDeCasting o JOIN o.metier m JOIN m.domaine d WHERE d.identifiant = :val")
            ->setParameter('val', $value)
            ->getResult();

    }

    public function findByContrat(?int $value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.typeContrat = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    public function findByMetier(?int $value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.metier = :val')
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
