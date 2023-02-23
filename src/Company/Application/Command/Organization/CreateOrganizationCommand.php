<?php

declare(strict_types=1);

namespace App\Company\Application\Command\Organization;

use App\Shared\Application\Command\CommandInterface;

final class CreateOrganizationCommand implements CommandInterface
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $actualAddress,
        public readonly string $bank,
        public readonly int $inn,
        public readonly string $legalAddress,
        public readonly string $legalIndex,
        public readonly string $legalName,
        public readonly string $legalVirtue,
        public readonly string $name,
        public readonly int $number,
        public readonly string $phone,
        public readonly string $representative,
        public readonly string $representativeNominative,
        public readonly string $representativePosition,
    ) {
    }
}
