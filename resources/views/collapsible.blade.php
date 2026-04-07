@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'asChild' => AsChild::False,
    'open' => false,
])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $isOpen = (bool) $open;
    $classes = [$class];
    $attrs = ['data-slot' => 'collapsible', ...$attributes->toArray()];
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$attrs"
    :class="$classes"
    tag="div"
    x-data="collapsible({{ $isOpen ? 'true' : 'false' }})">{{ $slot }}</x-bladcn::as-child>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('collapsible', (open) => ({
                open: open,
                toggle() {
                    this.open = !this.open;
                    this.$dispatch('open-change', this.open);
                },
            }));
        });
    </script>
@endonce
