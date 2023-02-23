<?php

declare(strict_types=1);

namespace App\Company\Domain\Repository;

use App\Company\Domain\Entity\Affiliate;

interface AffiliateRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null): ?Affiliate;

    public function remove(Affiliate $affiliate): void;

    public function save(Affiliate $affiliate): void;
}
