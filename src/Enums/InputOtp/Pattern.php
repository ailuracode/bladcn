<?php

namespace AiluraCode\Bladcn\Enums\InputOtp;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;

enum Pattern: string implements HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case DigitsOnly = 'DIGITS_ONLY';
    case DigitsAndChars = 'DIGITS_AND_CHARS';
    case Any = 'ANY';

    public function toHtml(): string
    {
        return $this->value;
    }
}
