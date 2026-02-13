<div @blur="hide()"
    @focus="show()"
    @mouseenter="show()"
    @mouseleave="hide()"
    data-slot="tooltip-trigger">
    {{ $slot }}
</div>
