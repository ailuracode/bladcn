@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Booleanish)
@use(AiluraCode\Bladcn\Enums\Basic\Persistent)
@use(AiluraCode\Bladcn\Enums\Basic\Transition)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'open' => false,
    'persistent' => Persistent::False,
    'transition' => Transition::False,
])

@php
    $isOpen = Booleanish::coerceFrom($open)->isTrue();
    $classes = [$class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'alert-dialog'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}
    x-data="alertDialog({{ $isOpen ? 'true' : 'false' }})">
    {{ $slot }}
</div>

@once
    <script>
        addEventListener('alpine:init', () => {
            window._bladcnSlots.push('alert-dialog');
            Alpine.data('alertDialog', (initialOpen = false) => ({
                open: initialOpen,
                init() {
                    this.$watch('open', () => {
                        if (this.open) {
                            this.$nextTick(() => {
                                this.$el
                                    .querySelector(
                                        '[data-slot="alert-dialog-content"]'
                                    )
                                    ?.focus();
                            });
                        }
                    });
                },
                close() {
                    this.open = false;
                },
            }));
        });
    </script>
@endonce
