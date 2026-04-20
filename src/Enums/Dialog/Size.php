<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Dialog;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Size: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Sm = 'sm';
    case Lg = 'lg';
    case Xl = 'xl';
    case Full = 'full';

    public function toHtml(): string
    {
        return $this->value;
    }

    public function toClass(): string
    {
        return match ($this) {
            self::Default => 'sm:max-w-sm',
            self::Sm => 'sm:max-w-xs',
            self::Lg => 'sm:max-w-lg',
            self::Xl => 'sm:max-w-xl',
            self::Full => 'max-w-[calc(100%-2rem)]',
        };
    }
}
