@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Disabled)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'open' => false,
    'disabled' => Disabled::False,
])

@php
    $open = filter_var($open, FILTER_VALIDATE_BOOLEAN);
    $disabled = Disabled::coerceFrom($disabled);
    $isDisabled = $disabled->isTrue();
@endphp

<div {{ $attributes->class([$isDisabled ? 'pointer-events-none opacity-50' : '', $class])->merge([
        'id' => $id,
        'style' => $style,
        'class' => '',
        'data-slot' => 'dialog',
    ]) }}
    x-data="dialog(@js($open))">
    {{ $slot }}
</div>

@once
    <script>
        addEventListener('alpine:init', () => {
            Alpine.data('dialog', (open) => ({
                open: open,

                init() {
                    this.$watch('open', value => {
                        if (value) {
                            this.$refs.content?.focus()
                        } else {
                            this.$refs.trigger?.focus()
                        }
                    })
                },

                onOpenChange(open) {
                    this.open = open
                },
            }))
        })
    </script>
@endonce
