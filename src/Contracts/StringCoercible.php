<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Contracts;

interface StringCoercible
{
    public static function coerceFrom(mixed $value, bool $strict = false): self;

    public static function toArray(): array;
}
