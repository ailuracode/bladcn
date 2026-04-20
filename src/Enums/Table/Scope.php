<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Table;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Scope: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Col = 'col';
    case Row = 'row';
    case ColGroup = 'colgroup';
    case RowGroup = 'rowgroup';

    #[Override]
    public function toHtml(): string
    {
        return $this->value;
    }
}
