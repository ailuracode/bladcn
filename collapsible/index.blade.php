@props([
    'as' => 'div',
    'open' => false,
])

<x-as-child {{ $attributes }}
    data-slot='collapsible'
    tag='{{ $as }}'
    x-data="collapsible({{ $open ? 'true' : 'false' }})">
    {{ $slot }}
</x-as-child>

@pushOnce('bladcn-header')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('collapsible', (open) => ({
                open: open,
                toggle() {
                    this.open = !this.open;
                    this.$dispatch('open-change', this.open)
                }
            }))
        })
    </script>
@endPushOnce
