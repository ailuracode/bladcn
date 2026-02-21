@props([
    'orientation' => 'horizontal',
    'defaultValue',
])

@php
    $base = 'gap-2 group/tabs flex data-horizontal:flex-col';
@endphp

<div {{ $attributes->merge(['class' => $base]) }}
    data-{{ $orientation }}
    data-orientation='{{ $orientation }}'
    data-slot='tabs'
    x-data="{
        active: @js($defaultValue),
        init() {
            this.$watch('active', (value) => {
                this.$dispatch('change', value);
            });
        },
        setActive(value) {
            this.active = value;
        }
    }">
    {{ $slot }}
</div>
