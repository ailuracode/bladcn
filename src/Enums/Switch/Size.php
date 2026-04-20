<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Switch;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Size: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Sm = 'sm';
}
