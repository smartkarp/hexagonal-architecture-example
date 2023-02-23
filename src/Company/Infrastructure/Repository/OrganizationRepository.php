<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Repository;

use App\Company\Domain\Entity\Organization;
use App\Company\Domain\Repository\OrganizationRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class OrganizationRepository extends ServiceEntityRepository implements OrganizationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Organization::class);
    }

    public function find($id, $lockMode = null, $lockVersion = null): ?Organization
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

    public function remove(Organization $organization): void
    {
        $this->_em->remove($organization);
        $this->_em->flush();
    }

    public function save(Organization $organization): void
    {
        $this->_em->persist($organization);
        $this->_em->flush();
    }
}
