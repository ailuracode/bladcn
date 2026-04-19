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
    bladcnOptionsValidator('dialog', [
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

    $alpineProps = [
        'open' => $open,
        'persistent' => $persistent,
        'transition' => $transition,
        'events' => $events,
    ];
@endphp

<div {{ $attributes->class([$class])->merge([
    'id' => $id,
    'style' => $style,
    'data-slot' => 'dialog',
]) }}
    x-data="dialog(@js($alpineProps))">
    {{ $slot }}
</div>

@pushonce('bladcn-scripts')
    <script>
        addEventListener('alpine:init', () => {
            Alpine.data('dialog', ({
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
                                        '[data-slot="dialog-content"]'
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
            }))
        })
    </script>
@endpushonce
