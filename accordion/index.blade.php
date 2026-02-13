@props([
    'open' => false,
    'type' => 'multiple',
    'defaultValue' => null,
])

<div @if (!$open) x-cloak @endif
    class="flex w-full flex-col"
    data-slot="accordion"
    x-data="accordion({{ $open ? 'true' : 'false' }}, '{{ $type }}', '{{ $defaultValue }}')">
    {{ $slot }}
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('accordion', (open, type, defaultValue) => ({
                open: type === 'single' ? null : [],
                isSingleMode: type === 'single',
                init() {
                    if (defaultValue) {
                        this.toggle(defaultValue);
                    }
                },
                toggle(value) {
                    if (this.isSingleMode) {
                        this.open = this.open === value ? null : value;
                    } else {
                        const index = this.open.indexOf(value);
                        if (index > -1) {
                            this.open.splice(index, 1);
                        } else {
                            this.open.push(value);
                        }
                    }
                },
                isSelected(value) {
                    return this.isSingleMode ?
                        this.open === value :
                        this.open.includes(value);
                },
            }))
        })
    </script>
@endonce
