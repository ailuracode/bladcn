<?php

namespace AiluraCode\BladCN\Components;

use AiluraCode\BladCN\Enums\Button\Size;
use AiluraCode\BladCN\Enums\Button\Variant;
use AiluraCode\BlaseUi\Components\Button as Base;
use AiluraCode\BlaseUi\Enums\Button\Type;
use AiluraCode\BlaseUi\Enums\Interactive\Disabled;

class Button extends Base
{
    protected static string $base = 'focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 rounded-lg border border-transparent bg-clip-padding text-sm font-medium focus-visible:ring-3 aria-invalid:ring-3 [&_svg:not([class*=\'size-\'])]:size-4 inline-flex items-center justify-center whitespace-nowrap transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none shrink-0 [&_svg]:shrink-0 outline-none group/button select-none';

    public function __construct(
        ?string        $id = null,
        ?string        $class = null,
        ?string        $style = null,
        ?string        $title = null,
        string|Type    $type = Type::Button,
        bool|Disabled  $disabled = Disabled::False,
        string|Variant $variant = Variant::Default,
        string|Size    $size = Size::Default,
    )
    {
        $_variant = Variant::coerceToValue($variant);
        $_size = Size::coerceToValue($size);

        parent::__construct(
            id: $id,
            class: $this->mergedClass($_variant, $_size, $class),
            style: $style,
            title: $title,
            type: $type,
            disabled: $disabled,
        );

        $this->mergeAttributes([
            'data-slot' => 'button',
            'data-size' => $_size->value,
            'data-variant' => $_variant->value,
        ]);
    }

    private static function mergedClass(Variant $variant, Size $size, ?string $class): string
    {
        $variant = match ($variant) {
            Variant::Default => 'bg-primary text-primary-foreground [a]:hover:bg-primary/80',
            Variant::Outline => 'border-border bg-background hover:bg-muted hover:text-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 aria-expanded:bg-muted aria-expanded:text-foreground',
            Variant::Secondary => 'bg-secondary text-secondary-foreground hover:bg-secondary/80 aria-expanded:bg-secondary aria-expanded:text-secondary-foreground',
            Variant::Ghost => 'hover:bg-muted hover:text-foreground dark:hover:bg-muted/50 aria-expanded:bg-muted aria-expanded:text-foreground',
            Variant::Destructive => 'bg-destructive/10 hover:bg-destructive/20 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/20 text-destructive focus-visible:border-destructive/40 dark:hover:bg-destructive/30',
            Variant::Link => 'text-primary underline-offset-4 hover:underline',
        };

        $size = match ($size) {
            Size::Default => 'h-8 gap-1.5 px-2.5 has-data-[icon=inline-end]:pr-2 has-data-[icon=inline-start]:pl-2',
            Size::XS => 'h-6 gap-1 rounded-[min(var(--radius-md),10px)] px-2 text-xs in-data-[slot=button-group]:rounded-lg has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*=\'size-\'])]:size-3',
            Size::SM => 'h-7 gap-1 rounded-[min(var(--radius-md),12px)] px-2.5 text-[0.8rem] in-data-[slot=button-group]:rounded-lg has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*=\'size-\'])]:size-3.5',
            Size::LG => 'h-9 gap-1.5 px-2.5 has-data-[icon=inline-end]:pr-3 has-data-[icon=inline-start]:pl-3',
            Size::Icon => 'size-8',
            Size::IconXS => 'size-6 rounded-[min(var(--radius-md),10px)] in-data-[slot=button-group]:rounded-lg [&_svg:not([class*=\'size-\'])]:size-3',
            Size::IconSM => 'size-7 rounded-[min(var(--radius-md),12px)] in-data-[slot=button-group]:rounded-lg',
            Size::IconLG => 'size-9',
        };

        return trim(static::$base . ' ' . $variant . ' ' . $size . ' ' . $class);
    }
}
