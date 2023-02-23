<?php

declare(strict_types=1);

namespace App\Company\Application\Query\Organization;

use App\Company\Domain\Entity\Organization;
use App\Company\Domain\Repository\OrganizationRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

final class QueryOrganizationHandler implements QueryHandlerInterface
{
    public function __construct(
        private readonly OrganizationRepositoryInterface $organizationRepository,
    ) {
    }

    public function __invoke(QueryOrganization $query): ?Organization
    {
        return $this->organizationRepository->find($query->id);
    }
}
