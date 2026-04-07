<?php

namespace AiluraCode\BladCN\Enums\Button;

enum Size: string
{
    case Default = 'default';
    case XS = 'xs';
    case SM = 'sm';
    case LG = 'lg';
    case Icon = 'icon';
    case IconXS = 'icon-xs';
    case IconSM = 'icon-sm';
    case IconLG = 'icon-lg';

    public static function coerceToValue(mixed $value): Size
    {
        return $value instanceof self
            ? $value
            : self::from($value);
    }
}
