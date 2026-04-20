<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Enums\Button;

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
            Variant::Default => 'bg-primary text-primary-foreground [a]:hover:bg-primary/80',
            Variant::Outline => 'border-border bg-background hover:bg-muted hover:text-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 aria-expanded:bg-muted aria-expanded:text-foreground',
            Variant::Secondary => 'bg-secondary text-secondary-foreground hover:bg-secondary/80 aria-expanded:bg-secondary aria-expanded:text-secondary-foreground',
            Variant::Ghost => 'hover:bg-muted hover:text-foreground dark:hover:bg-muted/50 aria-expanded:bg-muted aria-expanded:text-foreground',
            Variant::Destructive => 'bg-destructive/10 hover:bg-destructive/20 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/20 text-destructive focus-visible:border-destructive/40 dark:hover:bg-destructive/30',
            Variant::Link => 'text-primary underline-offset-4 hover:underline',
        };
    }
}
