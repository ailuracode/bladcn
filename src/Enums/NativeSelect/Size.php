<?php

namespace AiluraCode\Bladcn\Enums\NativeSelect;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Size: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Sm = 'sm';

    public function toHtml(): string
    {
        return $this->value;
    }
}
