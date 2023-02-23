<?php

declare(strict_types=1);

namespace App\Company\Domain\Factory;

use App\Company\Domain\Entity\Affiliate;
use App\Company\Domain\Entity\Organization;

final class AffiliateFactory
{
    public function create(
        string $address,
        string $code,
        ?string $city,
        string $id,
        string $name,
        Organization $organization,
        string $phone,
    ): Affiliate {
        $affiliate = new Affiliate($id);
        $affiliate
            ->setAddress($address)
            ->setCode($code)
            ->setCity($city)
            ->setName($name)
            ->setOrganization($organization)
            ->setPhone($phone);

        return $affiliate;
    }
}
