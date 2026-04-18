@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'type' => 'multiple',
    'defaultValue' => null,
    'transition' => true,
])

@php
    bladcnOptionsValidator('accordion', [
        'type' => [
            'value' => $type,
            'options' => ['multiple', 'single'],
        ],
        'transition' => [
            'value' => $transition,
            'options' => [true, false],
        ],
    ]);

    $defaults = bladcnSplit($defaultValue);
    $hasChangeEvent = bladcnHasEvent($attributes, 'change');
    $hasToggleEvent = bladcnHasEvent($attributes, 'toggle');

    $base = 'flex w-full flex-col';
    $classes = [$base, $class];

    $bladeAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'accordion',
        'data-type' => $type,
    ];

    $alpineProps = [
        'type' => $type,
        'defaults' => $defaults,
        'events' => [
            'change' => $hasChangeEvent,
            'toggle' => $hasToggleEvent,
        ],
    ];
@endphp

<div {{ $attributes->class($classes)->merge($bladeAttrs) }}
    x-data="accordion(@js($alpineProps))">
    {{ $slot }}
</div>

@pushonce('bladcn-scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('accordion', ({
                type,
                defaults,
                events,
            }) => ({
                isSingleMode: type === 'single',
                expandedItems: type === 'single' ?
                    defaults.slice(0, 1) : [...defaults],
                events,

                init() {
                    if (this.events.change) {
                        this.$watch('expandedItems', (
                        value) => {
                            this.$dispatch('change', {
                                expandedItems: value,
                                mode: this
                                    .isSingleMode ?
                                    'single' :
                                    'multiple',
                            });
                        });
                    }
                },

                toggle(value) {
                    const isOpen = this.expandedItems.includes(
                        value);

                    if (isOpen) {
                        this.expandedItems = this.expandedItems
                            .filter((v) => v !== value);
                    } else {
                        this.expandedItems = this.isSingleMode ?
                            [value] : [...this.expandedItems,
                                value
                            ];
                    }

                    if (this.events.toggle) {
                        this.$dispatch('toggle', {
                            value,
                            open: !isOpen
                        });
                    }
                },

                isSelected(value) {
                    return this.expandedItems.includes(value);
                },
            }));
        });
    </script>
@endpushonce
