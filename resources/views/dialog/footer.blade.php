@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'showCloseButton' => false,
])

@php
    $base =
        'bg-muted/50 -mx-4 -mb-4 rounded-b-xl border-t p-4 flex flex-col-reverse gap-2 sm:flex-row sm:justify-end';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'dialog-footer'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}@if ($showCloseButton)
        <x-bladcn::button variant="outline"
            x-on:click="open = false">Close</x-bladcn::button>
    @endif
</div>
