@props([
    'open' => false,
])

@php
    if ($open === 'true') {
        $open = true;
    } elseif ($open === 'false') {
        $open = false;
    }
@endphp

<div {{ $attributes->merge([
    'class' => '',
]) }}
    data-slot="alert-dialog"
    x-data="alertDialog({{ $open ? 'true' : 'false' }})">
    {{ $slot }}
</div>

@once
    <script>
        addEventListener('alpine:init', () => {
            Alpine.data('alertDialog', (open) => ({
                open: open,

                init() {
                    this.$watch('open', value => {
                        if (value) {
                            this.$refs.content?.focus()
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
