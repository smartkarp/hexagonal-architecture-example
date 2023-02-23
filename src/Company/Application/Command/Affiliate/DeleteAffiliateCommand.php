<?php

declare(strict_types=1);

namespace App\Company\Application\Command\Affiliate;

use App\Shared\Application\Command\CommandInterface;

final class DeleteAffiliateCommand implements CommandInterface
{
    public function __construct(
        public readonly string $id,
    ) {
    }
}
