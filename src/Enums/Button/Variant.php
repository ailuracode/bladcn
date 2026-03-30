<?php

namespace AiluraCode\BladCN\Enums\Button;

enum Variant: string
{
    case Default = 'default';
    case Outline = 'outline';
    case Secondary = 'secondary';
    case Ghost = 'ghost';
    case Destructive = 'destructive';
    case Link = 'link';

    public static function coerceToValue(mixed $value): Variant
    {
        return $value instanceof self
            ? $value
            : self::from($value);
    }
}
