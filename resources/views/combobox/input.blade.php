@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'disabled' => false,
    'showTrigger' => true,
    'showClear' => false,
    'placeholder' => null,
])

@php
    $showTrigger = filter_var($showTrigger, FILTER_VALIDATE_BOOLEAN);
    $showClear = filter_var($showClear, FILTER_VALIDATE_BOOLEAN);
@endphp

<x-bladcn::input-group {{ $attributes->class(['w-auto', $class]) }}>
    <x-bladcn::input-group.input :disabled="$disabled"
        :placeholder="$placeholder"
        x-model="text"
        x-on:blur="closeCombobox"
        x-on:focus="openCombobox"
        x-on:input="search"
        x-on:keydown.escape.window="closeCombobox" />
    <x-bladcn::input-group.addon align="inline-end">
        @if ($showTrigger)
            <x-bladcn::input-group.button :disabled="$disabled"
                class="group-has-data-[slot=combobox-clear]/input-group:hidden data-pressed:bg-transparent"
                data-slot="input-group-button"
                size="icon-xs"
                variant="ghost"
                x-on:click="toggleCombobox"
                x-show="selected === null">
                <x-bladcn::combobox.trigger />
            </x-bladcn::input-group.button>
        @endif
        @if ($showClear)
            <x-bladcn::combobox.clear :disabled="$disabled"
                x-on:click.prevent.stop="clearCombobox"
                x-show="selected !== null" />
        @endif
    </x-bladcn::input-group.addon>
</x-bladcn::input-group>
