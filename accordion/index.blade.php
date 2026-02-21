@props([
    'type' => 'multiple',
    'defaultValue' => null,
    'transition' => false,
])

<div class='flex w-full flex-col'
    data-slot='accordion'
    x-data="accordion(@js($type), @js($defaultValue))">
    {{ $slot }}
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('accordion', (type, defaultValue) => ({
                open: type === 'single' ? null : [],
                isSingleMode: type === 'single',
                triggerMap: new Map(),
                parseDefaultValues(value) {
                    if (!value) return [];
                    if (Array.isArray(value)) return value;
                    if (typeof value === 'string') {
                        return value.split(',').map(v => v
                        .trim()).filter(v => v);
                    }
                    return [];
                },
                buildTriggerMap() {
                    this.$el.querySelectorAll(
                            '[data-slot="accordion-trigger"]')
                        .forEach(trigger => {
                            const value = trigger
                                .getAttribute(
                                    'data-accordion-value');
                            if (value) {
                                const icon = trigger
                                    .querySelector(
                                        '[data-slot="accordion-trigger-icon"]'
                                        );
                                this.triggerMap.set(value, {
                                    trigger,
                                    icon
                                });
                            }
                        });
                },
                init() {
                    this.buildTriggerMap();
                    const valuesToToggle = this
                        .parseDefaultValues(defaultValue);
                    if (valuesToToggle.length > 0) {
                        valuesToToggle.forEach(value => this
                            .toggle(value));
                    }
                    if (this.isSingleMode) {
                        this.$watch('open', (newValue) => {
                            this.triggerMap.forEach((
                                item, value
                                ) => {
                                const {
                                    icon
                                } = item;
                                if (icon) {
                                    icon.classList
                                        .toggle(
                                            'rotate-180',
                                            newValue ===
                                            value
                                            );
                                }
                            });
                        });
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
