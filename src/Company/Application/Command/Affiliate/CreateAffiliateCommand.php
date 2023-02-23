<?php

declare(strict_types=1);

namespace App\Company\Application\Command\Affiliate;

use App\Shared\Application\Command\CommandInterface;

final class CreateAffiliateCommand implements CommandInterface
{
    public function __construct(
        public readonly string $address,
        public readonly string $code,
        public readonly ?string $city,
        public readonly string $id,
        public readonly string $name,
        public readonly string $organization,
        public readonly string $phone,
    ) {
    }
}
