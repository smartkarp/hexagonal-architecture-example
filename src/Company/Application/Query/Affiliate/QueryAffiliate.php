<?php

declare(strict_types=1);

namespace App\Company\Application\Query\Affiliate;

use App\Shared\Application\Query\QueryInterface;

final class QueryAffiliate implements QueryInterface
{
    public function __construct(
        public readonly string $id,
    ) {
    }
}
