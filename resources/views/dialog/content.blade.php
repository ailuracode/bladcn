@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Dialog\Size)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => Size::Default,
    'showCloseButton' => true,
])

@php
    $size = Size::coerceFrom($size);
    $base =
        'bg-background data-open:animate-in data-closed:animate-out data-closed:fade-out-0 data-open:fade-in-0 data-closed:zoom-out-95 data-open:zoom-in-95 ring-foreground/10 grid gap-4 rounded-xl p-4 text-sm ring-1 duration-100 ' .
        $size->toClass() .
        ' fixed top-1/2 left-1/2 z-50 w-full -translate-x-1/2 -translate-y-1/2 outline-none';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'dialog-content',
        'data-size' => $size->toHtml(),
        'x-on:click.away' => 'open = false',
        'x-on:keydown.escape.window' => 'open = false',
        'x-ref' => 'content',
        'x-show' => 'open',
        'x-transition:enter-end' => 'opacity-100 scale-100',
        'x-transition:enter-start' => 'opacity-0 scale-95',
        'x-transition:enter' => 'transition ease-out duration-200',
        'x-transition:leave-end' => 'opacity-0 scale-95',
        'x-transition:leave-start' => 'opacity-100 scale-100',
        'x-transition:leave' => 'transition ease-in duration-150',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}@if ($showCloseButton)
        <x-bladcn::button aria-label="Close"
            class="absolute right-2 top-2"
            size="icon-sm"
            variant="ghost"
            x-on:click="open = false"><x-bladcn::icon class="h-4 w-4"
                name="x" /></x-bladcn::button>
    @endif
</div>
