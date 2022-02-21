<?php

namespace App\Repository;

use App\Entity\Contacti;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contacti|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacti|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacti[]    findAll()
 * @method Contacti[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contacti::class);
    }

    // /**
    //  * @return Contacti[] Returns an array of Contacti objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contacti
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
