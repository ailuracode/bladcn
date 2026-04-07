<?php

namespace AiluraCode\Bladcn\Enums\Sheet;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Side: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Right = 'right';
    case Left = 'left';
    case Top = 'top';
    case Bottom = 'bottom';

    public function toHtml(): string
    {
        return $this->value;
    }

    public function toPositionClass(): string
    {
        return match ($this) {
            self::Right => 'inset-y-0 right-0 w-3/4 sm:max-w-sm border-l',
            self::Left => 'inset-y-0 left-0 w-3/4 sm:max-w-sm border-r',
            self::Top => 'inset-x-0 top-0 border-b',
            self::Bottom => 'inset-x-0 bottom-0 border-t',
        };
    }

    public function toEnterStart(): string
    {
        return match ($this) {
            self::Right => 'translate-x-full',
            self::Left => '-translate-x-full',
            self::Top => '-translate-y-full',
            self::Bottom => 'translate-y-full',
        };
    }
}
