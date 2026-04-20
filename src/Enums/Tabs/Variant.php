<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Tabs;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Variant: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Line = 'line';

    public function toHtml(): string
    {
        return $this->value;
    }
}
