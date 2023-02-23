<?php

declare(strict_types=1);

namespace App\Company\Domain\Entity;

use App\Shared\Domain\Entity\ArrayCollection;
use App\Shared\Domain\Entity\Collection;

class Organization
{
    private ?string $actualAddress = null;

    /**
     * @var Collection<Affiliate>
     */
    private Collection $affiliates;

    private string $bank;

    private string $id;

    private int $inn;

    private string $legalAddress;

    private string $legalIndex;

    private string $legalName;

    private string $legalVirtue;

    private string $name;

    private int $number;

    private string $phone;

    private string $representative;

    private string $representativeNominative;

    private string $representativePosition;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->affiliates = new ArrayCollection();
    }

    public function addAffiliate(Affiliate $affiliate): self
    {
        if (!$this->affiliates->contains($affiliate)) {
            $this->affiliates->add($affiliate);
            $affiliate->setOrganization($this);
        }

        return $this;
    }

    public function getActualAddress(): ?string
    {
        return $this->actualAddress;
    }

    public function setActualAddress(?string $actualAddress): self
    {
        $this->actualAddress = $actualAddress;

        return $this;
    }

    /**
     * @return Affiliate[]
     */
    public function getAffiliates(): array
    {
        return $this->affiliates->toArray();
    }

    public function getBank(): string
    {
        return $this->bank;
    }

    public function setBank(string $bank): self
    {
        $this->bank = $bank;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getInn(): int
    {
        return $this->inn;
    }

    public function setInn(int $inn): self
    {
        $this->inn = $inn;

        return $this;
    }

    public function getLegalAddress(): string
    {
        return $this->legalAddress;
    }

    public function setLegalAddress(string $legalAddress): self
    {
        $this->legalAddress = $legalAddress;

        return $this;
    }

    public function getLegalIndex(): string
    {
        return $this->legalIndex;
    }

    public function setLegalIndex(string $legalIndex): self
    {
        $this->legalIndex = $legalIndex;

        return $this;
    }

    public function getLegalName(): string
    {
        return $this->legalName;
    }

    public function setLegalName(string $legalName): self
    {
        $this->legalName = $legalName;

        return $this;
    }

    public function getLegalVirtue(): string
    {
        return $this->legalVirtue;
    }

    public function setLegalVirtue(string $legalVirtue): self
    {
        $this->legalVirtue = $legalVirtue;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRepresentative(): string
    {
        return $this->representative;
    }

    public function setRepresentative(string $representative): self
    {
        $this->representative = $representative;

        return $this;
    }

    public function getRepresentativeNominative(): string
    {
        return $this->representativeNominative;
    }

    public function setRepresentativeNominative(string $representativeNominative): self
    {
        $this->representativeNominative = $representativeNominative;

        return $this;
    }

    public function getRepresentativePosition(): string
    {
        return $this->representativePosition;
    }

    public function setRepresentativePosition(string $representativePosition): self
    {
        $this->representativePosition = $representativePosition;

        return $this;
    }

    public function removeAffiliate(Affiliate $affiliate): self
    {
        $this->affiliates->removeElement($affiliate);

        return $this;
    }
}
