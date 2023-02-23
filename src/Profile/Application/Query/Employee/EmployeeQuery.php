<?php

declare(strict_types=1);

namespace App\Profile\Application\Query\Employee;

use App\Shared\Application\Query\QueryInterface;

final class EmployeeQuery implements QueryInterface
{
    public function __construct(
        public readonly ?string $id = null
    ) {
    }
}
