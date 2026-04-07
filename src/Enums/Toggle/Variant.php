<?php

namespace AiluraCode\Bladcn\Enums\Toggle;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Variant: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Outline = 'outline';
}
