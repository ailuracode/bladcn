<?php

namespace AiluraCode\Bladcn\Enums\AlertDialog;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\Classable;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Size: string implements Classable, HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case SM = 'sm';

    #[Override]
    public function toClass(): string
    {
        return match ($this) {
            self::Default => 'max-w-xs sm:max-w-sm',
            self::SM => 'max-w-xs',
        };
    }
}