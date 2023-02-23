<?php

declare(strict_types=1);

namespace App\Company\Application\Query\Organization;

use App\Shared\Application\Query\QueryInterface;

final class QueryOrganization implements QueryInterface
{
    public function __construct(
        public readonly string $id,
    ) {
    }
}
