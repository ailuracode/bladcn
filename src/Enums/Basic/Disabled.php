<?php

namespace AiluraCode\Bladcn\Enums\Basic;

use AiluraCode\Bladcn\Concerns\HasBooleanCoercion;
use AiluraCode\Bladcn\Contracts\Classable;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Disabled implements Classable, HtmlRenderable, StringCoercible
{
    use HasBooleanCoercion;

    case True;
    case False;

    #[Override]
    public function toClass(): string
    {
        return match ($this) {
            self::True => 'pointer-events-none opacity-50',
            self::False => '',
        };
    }
}
