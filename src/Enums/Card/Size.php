<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Card;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Size: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case SM = 'sm';

    #[Override]
    public function toHtml(): ?string
    {
        return $this->value;
    }
}
