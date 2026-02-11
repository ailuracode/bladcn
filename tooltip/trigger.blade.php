<div
    data-slot="tooltip-trigger"
    @mouseenter="show()"
    @mouseleave="hide()"
    @focus="show()"
    @blur="hide()"
>
    {{ $slot }}
</div>
