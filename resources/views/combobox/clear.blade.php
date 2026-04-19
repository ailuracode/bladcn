@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['opacity-50 hover:opacity-100', $class];
    $clearAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'combobox-clear',
        'x-on:click' => 'clearCombobox',
    ];
@endphp

<x-bladcn::as-child :attrs="$clearAttrs"
    :class="$classes"
    tag="div">
    <x-bladcn::button :class="$class"
        :id="$id"
        :style="$style"
        asChild="true"
        data-slot="combobox-clear"
        size="icon-xs"
        variant="ghost">
        <x-lucide-x class="h-4 w-4" />
    </x-bladcn::button>
</x-bladcn::as-child>
