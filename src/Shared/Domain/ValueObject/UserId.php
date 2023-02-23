<?php

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Service\Assert;
use App\Shared\Domain\Service\Uuid;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
class UserId
{
    private string $id;

    public function __construct(string $id)
    {
        Assert::true(Uuid::isValid($id));
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
