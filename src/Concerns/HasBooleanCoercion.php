<?php

namespace AiluraCode\Bladcn\Concerns;

use InvalidArgumentException;
use Override;

trait HasBooleanCoercion
{
    use HasTransform;

    #[Override]
    public static function coerceFrom(mixed $value, bool $strict = false): self
    {
        if ($value instanceof self) {
            return $value;
        }

        if ($value === true || $value === 'true' || $value === '') {
            return self::True;
        }

        if ($value === false || $value === 'false' || $value === null) {
            return self::False;
        }

        if ($strict) {
            throw new InvalidArgumentException("Invalid value: {$value}");
        }

        return self::False;
    }

    #[Override]
    public function toHtml(): ?string
    {
        return $this->isTrue() ? '' : null;
    }

    public function isTrue(): bool
    {
        return $this === self::True;
    }

    public function isFalse(): bool
    {
        return ! $this->isTrue();
    }
}
