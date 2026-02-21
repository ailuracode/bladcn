@props([
    'type' => 'multiple',
    'defaultValue' => null,
    'transition' => false,
])

<div class='flex w-full flex-col'
    data-slot='accordion'
    x-data="accordion('{{ $type }}', '{{ $defaultValue }}')">
    {{ $slot }}
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('accordion', (type, defaultValue) => ({
                open: type === 'single' ? null : [],
                isSingleMode: type === 'single',
                init() {
                    if (defaultValue) this.toggle(defaultValue);
                },
                toggle(value) {
                    if (this.isSingleMode) {
                        this.open = this.open === value ? null :
                            value;
                    } else {
                        const index = this.open.indexOf(value);
                        index > -1 ? this.open.splice(index,
                            1) : this.open.push(value);
                    }
                },
                isSelected(value) {
                    return this.isSingleMode ? this.open ===
                        value : this.open.includes(value);
                },
            }))
        })
    </script>
@endonce
