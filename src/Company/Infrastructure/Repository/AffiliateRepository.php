<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Repository;

use App\Company\Domain\Entity\Affiliate;
use App\Company\Domain\Repository\AffiliateRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class AffiliateRepository extends ServiceEntityRepository implements AffiliateRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Affiliate::class);
    }

    public function find($id, $lockMode = null, $lockVersion = null): ?Affiliate
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

    public function remove(Affiliate $affiliate): void
    {
        $this->_em->remove($affiliate);
        $this->_em->flush();
    }

    public function save(Affiliate $affiliate): void
    {
        $this->_em->persist($affiliate);
        $this->_em->flush();
    }
}
