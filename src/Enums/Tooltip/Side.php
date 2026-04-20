<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Tooltip;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Side: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Top = 'top';
    case Bottom = 'bottom';
    case Left = 'left';
    case Right = 'right';

    public function toHtml(): string
    {
        return $this->value;
    }
}
