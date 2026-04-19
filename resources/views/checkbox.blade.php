@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'defaultChecked' => false,
    'disabled' => false,
])

@php
    $alpineProps = [
        'value' => $defaultChecked,
        'disabled' => $disabled,
    ];
@endphp

<span
    {{ $attributes->whereDoesntStartWith(['x-on:', 'wire:', '@'])->class([
            'border-input dark:bg-input/30 data-checked:bg-primary data-checked:text-primary-foreground dark:data-checked:bg-primary data-checked:border-primary aria-invalid:aria-checked:border-primary aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 flex size-4 items-center justify-center rounded-[4px] border transition-colors group-has-disabled/field:opacity-50 focus-visible:ring-3 aria-invalid:ring-3 relative shrink-0 outline-none after:absolute after:-inset-x-3 after:-inset-y-2 disabled:cursor-not-allowed disabled:opacity-50',
            $class,
        ])->merge([
            'data-slot' => 'checkbox',
            'data-checked' => $defaultChecked,
            'data-disabled' => $disabled,
            'x-ref' => 'box',
        ]) }}
    x-data="checkbox(@js($alpineProps))"
    x-on:click="toggle">
    <input
        {{ $attributes->except(['x-on:', 'wire:', '@'])->except('class')->merge([
                'id' => $id,
                'style' => $style,
                'checked' => $defaultChecked,
                'disabled' => $disabled,
                'class' => 'peer sr-only',
                'type' => 'checkbox',
                'x-model' => 'value',
                'x-ref' => 'input',
            ]) }}>

    <x-lucide-check @class([
        'pointer-events-none absolute inset-0 flex items-center justify-center',
        'hidden' => !$defaultChecked,
    ])
        x-ref='icon' />
</span>

@pushonce('bladcn-scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('checkbox', ({
                value,
                disabled,
            }) => ({
                value,
                disabled,

                toggle() {
                    if (this.disabled) return;
                    this.value = !this.value;
                    if (this.value) {
                        this.$refs.box.setAttribute(
                            'data-checked', true)
                    } else {
                        this.$refs.box.removeAttribute(
                            'data-checked')
                    }
                    this.$refs.icon.classList.toggle('hidden');
                },
            }))
        })
    </script>
@endpushonce
