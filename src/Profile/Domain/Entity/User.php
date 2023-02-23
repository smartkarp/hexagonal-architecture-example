<?php

declare(strict_types=1);

namespace App\Profile\Domain\Entity;

use App\Shared\Domain\Service\Uuid;
use App\Shared\Domain\ValueObject\UserId;
use DateTime;

final class User
{
    private ?string $authCode = null;

    private ?DateTime $authCodeExpiration = null;

    private string $firstName;

    private string $id;

    private string $lastName;

    private ?string $patronymic = null;

    private string $username;

    public function __construct()
    {
        $this->id = (string) Uuid::v4();
    }

    public function getAuthCode(): ?string
    {
        return $this->authCode;
    }

    public function setAuthCode(?string $authCode): self
    {
        $this->authCode = $authCode;

        return $this;
    }

    public function getAuthCodeExpiration(): ?DateTime
    {
        return $this->authCodeExpiration;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getId(): UserId
    {
        return new UserId($this->id);
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    private function setAuthCodeExpiration(?DateTime $authCodeExpiration): self
    {
        $this->authCodeExpiration = $authCodeExpiration;

        return $this;
    }
}
