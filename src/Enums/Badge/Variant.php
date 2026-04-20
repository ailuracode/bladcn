<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Badge;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\Classable;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Variant: string implements Classable, HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case Outline = 'outline';
    case Secondary = 'secondary';
    case Ghost = 'ghost';
    case Destructive = 'destructive';
    case Link = 'link';

    #[Override]
    public function toClass(): string
    {
        return match ($this) {
            Variant::Default => 'bg-primary text-primary-foreground [a&]:hover:bg-primary/90',
            Variant::Outline => 'border-border text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground',
            Variant::Secondary => 'bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90',
            Variant::Ghost => '[a&]:hover:bg-accent [a&]:hover:text-accent-foreground',
            Variant::Destructive => 'bg-destructive text-white [a&]:hover:bg-destructive/90 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/60',
            Variant::Link => 'text-primary underline-offset-4 [a&]:hover:underline',
        };
    }
}
