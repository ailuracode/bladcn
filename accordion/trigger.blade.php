@aware([
    'value' => null,
    'defaultValue' => null,
    'transition' => false,
])

<button :aria-expanded="isSelected('{{ $value }}')"
    @class([
        'group/accordion-trigger relative flex w-full items-start justify-between rounded-lg border border-transparent',
        'py-2.5 text-left text-sm font-medium outline-none transition-all',
        'hover:underline disabled:pointer-events-none disabled:opacity-50',
        'focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 focus-visible:after:border-ring',
        '**:data-[slot=accordion-trigger-icon]:ml-auto **:data-[slot=accordion-trigger-icon]:size-4',
        '**:data-[slot=accordion-trigger-icon]:text-muted-foreground',
    ])
    data-accordion-value='{{ $value }}'
    data-slot='accordion-trigger'
    type='button'
    x-data="{
        isOpen: {{ in_array($value, (array) $defaultValue) ? 'true' : 'false' }},
        init() {
            this.$watch(() => isSelected('{{ $value }}'), (value) => {
                this.isOpen = value;
                if (!isSingleMode) {
                    this.$refs.icon?.classList.toggle('rotate-180', value);
                }
            });
        }
    }"
    x-on:click="toggle('{{ $value }}')">
    {{ $slot }}
    <x-lucide-chevron-down @class([
        'pointer-events-none shrink-0 transition-transform duration-200',
        'rotate-180' => in_array($value, (array) $defaultValue),
    ])
        data-slot='accordion-trigger-icon'
        x-ref='icon' />
</button>
