@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'open' => false,
    'persistent' => false,
    'transition' => true,
])

@php
    bladcnOptionsValidator('alert-dialog', [
        'open' => ['value' => $open, 'options' => [true, false]],
        'persistent' => ['value' => $persistent, 'options' => [true, false]],
        'transition' => ['value' => $transition, 'options' => [true, false]],
    ]);

    $events = bladcnHasEvents($attributes, [
        'open',
        'close',
        'toggle',
        'escape',
        'overlay-click',
    ]);

    $bladeAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-dialog',
    ];

    $alpineProps = [
        'open' => $open,
        'persistent' => $persistent,
        'transition' => $transition,
        'events' => $events,
    ];
@endphp

<div {{ $attributes->class([$class])->merge($bladeAttrs) }}
    x-data="alertDialog(@js($alpineProps))">
    {{ $slot }}
</div>

@pushonce('bladcn-scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('alertDialog', ({
                open,
                persistent,
                transition,
                events,
            }) => ({
                open,
                persistent,
                transition,
                events,

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

                        if (this.events.open) {
                            this.$dispatch('open');
                        }
                        if (this.events.toggle) {
                            this.$dispatch('toggle', {
                                open: this.open
                            });
                        }
                    });
                },

                close() {
                    this.open = false;

                    if (this.events.close) {
                        this.$dispatch('close');
                    }
                },

                handleEvent(eventName) {
                    if (!this.persistent) {
                        if (this.events[eventName]) {
                            this.$dispatch(eventName);
                        }
                        this.close();
                    }
                },
            }));
        });
    </script>
@endpushonce
