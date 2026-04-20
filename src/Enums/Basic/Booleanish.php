<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Basic;

use AiluraCode\Bladcn\Concerns\HasBooleanCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Booleanish implements HtmlRenderable, StringCoercible
{
    use HasBooleanCoercion;

    case True;
    case False;
}
