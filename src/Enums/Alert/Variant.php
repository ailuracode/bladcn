<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Alert;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Variant: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Destructive = 'destructive';

    #[Override]
    public function toHtml(): string
    {
        return $this->value;
    }

    public function toClass(): string
    {
        return match ($this) {
            self::Default => 'bg-card text-card-foreground',
            self::Destructive => 'text-destructive bg-card *:data-[slot=alert-description]:text-destructive/90 *:[svg]:text-current',
        };
    }
}
