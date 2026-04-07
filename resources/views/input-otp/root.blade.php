@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'flex items-center has-disabled:opacity-50';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'input-otp'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}
    x-data="inputOtpContainer()">{{ $slot }}</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('inputOtpContainer', () => ({
                slots: {},
                registerSlot(index, element) {
                    this.slots[index] = element;
                },
            }));
        });
    </script>
@endonce
