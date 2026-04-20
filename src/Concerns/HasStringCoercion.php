<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Concerns;

use InvalidArgumentException;
use Override;

trait HasStringCoercion
{
    use HasTransform;

    #[Override]
    public static function coerceFrom(mixed $value, bool $strict = false): self
    {
        if ($value instanceof self) {
            return $value;
        }

        if ($strict) {
            return self::tryFrom($value) ?? throw new InvalidArgumentException('Invalid value: '.$value);
        }

        return self::tryFrom($value) ?? self::cases()[0];
    }

    #[Override]
    public function toHtml(): string
    {
        return $this->value;
    }
}
