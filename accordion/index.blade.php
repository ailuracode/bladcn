@props([
    'type' => 'multiple',
    'defaultValue' => null,
    'transition' => false,
])

<div class='flex w-full flex-col'
    data-slot='accordion'
    x-data="accordion('{{ $type }}', @js($defaultValue))">
    {{ $slot }}
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('accordion', (type, defaultValue) => ({
                open: type === 'single' ? null : [],
                isSingleMode: type === 'single',
                parseDefaultValues(value) {
                    if (!value) return [];
                    if (Array.isArray(value)) return value;
                    if (typeof value === 'string') {
                        return value.split(',').map(v => v
                            .trim()).filter(v => v);
                    }
                    return [];
                },
                init() {
                    const valuesToToggle = this
                        .parseDefaultValues(defaultValue);
                    if (valuesToToggle.length > 0) {
                        valuesToToggle.forEach(value =>
                            this
                            .toggle(value));
                    }
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
