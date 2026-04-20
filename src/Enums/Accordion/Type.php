<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Accordion;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Type: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Single = 'single';
    case Multiple = 'multiple';

    #[Override]
    public function toHtml(): string
    {
        return $this->value;
    }

    public function isSingle(): bool
    {
        return $this === self::Single;
    }

    public function isMultiple(): bool
    {
        return $this === self::Multiple;
    }
}
