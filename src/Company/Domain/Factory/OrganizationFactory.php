<?php

declare(strict_types=1);

namespace App\Company\Domain\Factory;

use App\Company\Domain\Entity\Organization;

final class OrganizationFactory
{
    public function create(
        string $id,
        ?string $actualAddress,
        string $bank,
        int $inn,
        string $legalAddress,
        string $legalIndex,
        string $legalName,
        string $legalVirtue,
        string $name,
        int $number,
        string $phone,
        string $representative,
        string $representativeNominative,
        string $representativePosition,
    ): Organization {
        $organization = new Organization($id);
        $organization
            ->setActualAddress($actualAddress)
            ->setBank($bank)
            ->setInn($inn)
            ->setLegalAddress($legalAddress)
            ->setLegalIndex($legalIndex)
            ->setLegalName($legalName)
            ->setLegalVirtue($legalVirtue)
            ->setName($name)
            ->setNumber($number)
            ->setPhone($phone)
            ->setRepresentative($representative)
            ->setRepresentativeNominative($representativeNominative)
            ->setRepresentativePosition($representativePosition);

        return $organization;
    }
}
