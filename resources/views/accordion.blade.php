@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Accordion\Type)
@use(AiluraCode\Bladcn\Enums\Basic\Transition)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'type' => Type::Multiple,
    'defaultValue' => null,
    'transition' => Transition::False,
])

@php
    $type = Type::coerceFrom($type);
    $base = 'flex w-full flex-col';
    $classes = [$base, $class];
    $hasChange =
        $attributes->has('x-on:change') || $attributes->has('wire:change');
    $model = $attributes->wire('model');
    $modelName = $model?->value();
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'accordion',
        'data-type' => $type->toHtml(),
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}
    x-data="accordion(@js($type->toHtml()), @js($defaultValue), @js($hasChange), @entangle($model))"> {{ $slot }}
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('accordion', (type, defaultValue, hasChange =
                undefined, model = undefined) => ({
                type,
                open: type === 'single' ? undefined : [],
                hasChange,
                model,

                init() {
                    this.toArray(defaultValue).forEach(v => this
                        .toggle(v));

                    if (this.model !== undefined) {
                        this.$watch('open', (value) => {
                            this.model = value;
                        });
                    }

                    if (this.hasChange) {
                        this.$watch('open', (value) => {
                            this.$dispatch('change',
                                value);
                        })
                    }
                },

                toggle(value) {
                    if (this.type === 'single') {
                        this.open = this.open === value ? null :
                            value;
                        return;
                    }

                    const i = this.open.indexOf(value);

                    if (i === -1) {
                        this.open.push(value);
                    } else {
                        this.open.splice(i, 1);
                    }
                },

                isSelected(value) {
                    return this.type === 'single' ?
                        this.open === value :
                        this.open.includes(value);
                },

                toArray(value) {
                    if (!value) return [];
                    if (Array.isArray(value)) return value;

                    if (typeof value === 'string') {
                        return value
                            .split(',')
                            .map(v => v.trim())
                            .filter(Boolean);
                    }

                    return [];
                }
            }));
        });
    </script>
@endonce
