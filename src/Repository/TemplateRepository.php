<?php

namespace App\Repository;

use App\Entity\Template;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Template|null find($id, $lockMode = null, $lockVersion = null)
 * @method Template|null findOneBy(array $criteria, array $orderBy = null)
 * @method Template[]    findAll()
 * @method Template[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Template::class);
    }

     /**
      * @return Template[]
      */

    public function getActiveTemplateList($status = Template::IS_ACTIVE)
    {
        return $this->createQueryBuilder('t')
            ->select('t.id,t.name')
            ->andWhere('t.isActive = :val')
            ->setParameter('val', $status)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;

    }

}
