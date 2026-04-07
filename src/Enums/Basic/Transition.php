<?php

namespace AiluraCode\Bladcn\Enums\Basic;

use AiluraCode\Bladcn\Concerns\HasBooleanCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Transition implements HtmlRenderable, StringCoercible
{
    use HasBooleanCoercion;

    case True;
    case False;

    #[Override]
    public function toHtml(): ?string
    {
        return $this->isTrue() ? '' : null;
    }

    public function toAlpineAttribute(): array
    {
        return [$this->isTrue() ? 'x-collapse' : 'x-collapse.duration.0ms' => ''];
    }
}
