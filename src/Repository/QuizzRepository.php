<?php

namespace App\Repository;

use App\Entity\Quizz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Quizz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quizz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quizz[]    findAll()
 * @method Quizz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quizz::class);
    }


    /**
     * @return Query
     */
    public function findAllVisible(PropertySearch $search): Query //fonction qui affichera les produits dans le catalogue
    {

        $query = $this->findVisibleQuery();

        if ($search->getSearchbar()) { //Si l'utilisateur recherche
            $query = $query->andwhere('q.r1 = :searchbar');
            $query->setParameter('searchbar', $search->getSearchbar());

        } else {
            echo "erreur";
        }

        return $query->getQuery(); //Construit une instance d'une requête
    }
    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('q'); //Construction d'une requete
    }


    // /**
    //  * @return Quizz[] Returns an array of Quizz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Quizz
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
