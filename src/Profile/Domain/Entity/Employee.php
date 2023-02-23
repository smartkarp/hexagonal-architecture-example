<?php

declare(strict_types=1);

namespace App\Profile\Domain\Entity;

use App\Shared\Domain\Entity\Aggregate;
use App\Shared\Domain\Service\Uuid;
use App\Shared\Domain\ValueObject\UserId;

final class Employee extends Aggregate
{
    private ?string $avatar = null;

    private string $id;

    private ?string $profileUrl = null;

    private string $userId;

    public function __construct()
    {
        $this->id = (string) Uuid::v4();
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getProfileUrl(): ?string
    {
        return $this->profileUrl;
    }

    public function setProfileUrl(?string $profileUrl): self
    {
        $this->profileUrl = $profileUrl;

        return $this;
    }

    public function getUserId(): UserId
    {
        return new UserId($this->userId);
    }

    public function setUserId(UserId $userId): self
    {
        $this->userId = $userId->getId();

        return $this;
    }
}
