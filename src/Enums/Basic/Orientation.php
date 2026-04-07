<?php

namespace AiluraCode\Bladcn\Enums\Basic;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Orientation: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Horizontal = 'horizontal';
    case Vertical = 'vertical';

    #[Override]
    public function toHtml(): ?string
    {
        return $this->value;
    }

    public function isVertical(): bool
    {
        return $this === self::Vertical;
    }
}
