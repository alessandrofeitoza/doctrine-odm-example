<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 15/09/18
 * Time: 09:14
 */

namespace Application\Repository;

use Application\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\ODM\MongoDB\LockMode;
use Doctrine\ODM\MongoDB\Tests\Functional\Order;

class UserRepository extends DocumentRepository
{
    public function __construct(DocumentManager $documentManager)
    {
        parent::__construct(
            $documentManager,
            $documentManager->getUnitOfWork(),
            $documentManager->getClassMetadata(User::class)
        );
    }

    public function find($id, $lockMode = LockMode::NONE, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

    public function findBy(array $criteria, array $sort = null, $limit = null, $skip = null)
    {
        return parent::findBy($criteria, $sort, $limit, $skip);
    }

    public function findAll()
    {
        return parent::findAll();
    }

    public function findOneBy(array $criteria)
    {
        return parent::findOneBy($criteria);
    }

    public function save(User $user)
    {
        $this->getDocumentManager()->persist($user);
        $this->getDocumentManager()->flush();
    }

    public function deleteOne(User $user)
    {
        $this->getDocumentManager()->remove($user);
    }

    public function findWithProjection(array $fields)
    {
        $queryBuilder = $this->getDocumentManager()->createQueryBuilder();

        return $queryBuilder
            ->select($fields) // ['name', 'email']
            ->getQuery()->execute();
    }

    public function findUserByPeriodRegister($initial, $final)
    {
        $builder = $this->createAggregationBuilder();
        $builder
            ->match()
            ->field('registered')
            ->gte($initial)
            ->lt($final)
            ->field('status')
            ->equals(true);

        return $builder->execute();
    }
}