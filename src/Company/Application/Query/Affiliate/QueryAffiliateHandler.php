<?php

declare(strict_types=1);

namespace App\Company\Application\Query\Affiliate;

use App\Company\Domain\Entity\Affiliate;
use App\Company\Domain\Repository\AffiliateRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

final class QueryAffiliateHandler implements QueryHandlerInterface
{
    public function __construct(
        private readonly AffiliateRepositoryInterface $affiliateRepository,
    ) {
    }

    public function __invoke(QueryAffiliate $query): ?Affiliate
    {
        return $this->affiliateRepository->find($query->id);
    }
}
