<?php

namespace AiluraCode\Bladcn\Enums\Button;

use AiluraCode\Bladcn\Concerns\HasStringCoercion;
use AiluraCode\Bladcn\Contracts\Classable;
use AiluraCode\Bladcn\Contracts\HtmlRenderable;
use AiluraCode\Bladcn\Contracts\StringCoercible;
use Override;

enum Size: string implements Classable, HtmlRenderable, StringCoercible
{
    use HasStringCoercion;

    case Default = 'default';
    case XS = 'xs';
    case SM = 'sm';
    case LG = 'lg';
    case Icon = 'icon';
    case IconXS = 'icon-xs';
    case IconSM = 'icon-sm';
    case IconLG = 'icon-lg';

    #[Override]
    public function toClass(): string
    {
        return match ($this) {
            self::Default => 'h-8 gap-1.5 px-2.5 has-data-[icon=inline-end]:pr-2 has-data-[icon=inline-start]:pl-2',
            self::XS => 'h-6 gap-1 rounded-[min(var(--radius-md),10px)] px-2 text-xs in-data-[slot=button-group]:rounded-lg has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*=\'size-\'])]:size-3',
            self::SM => 'h-7 gap-1 rounded-[min(var(--radius-md),12px)] px-2.5 text-[0.8rem] in-data-[slot=button-group]:rounded-lg has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*=\'size-\'])]:size-3.5',
            self::LG => 'h-9 gap-1.5 px-2.5 has-data-[icon=inline-end]:pr-3 has-data-[icon=inline-start]:pl-3',
            self::Icon => 'size-8',
            self::IconXS => 'size-6 rounded-[min(var(--radius-md),10px)] in-data-[slot=button-group]:rounded-lg [&_svg:not([class*=\'size-\'])]:size-3',
            self::IconSM => 'size-7 rounded-[min(var(--radius-md),12px)] in-data-[slot=button-group]:rounded-lg',
            self::IconLG => 'size-9',
        };
    }
}
