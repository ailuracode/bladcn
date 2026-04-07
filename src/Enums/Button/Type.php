<?php

namespace AiluraCode\Bladcn\Enums\Button;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Type: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Button = 'button';
    case Submit = 'submit';
    case Reset = 'reset';
}
