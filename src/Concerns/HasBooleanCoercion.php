<?php

declare(strict_types=1);

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

        if (in_array($value, [true, 'true', ''], true)) {
            return self::True;
        }

        if (in_array($value, [false, 'false', null], true)) {
            return self::False;
        }

        throw_if($strict, InvalidArgumentException::class, 'Invalid value: '.$value);

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
