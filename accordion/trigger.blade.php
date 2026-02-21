@aware([
    'value' => null,
    'transition' => false,
])

<button :aria-expanded="isSelected('{{ $value }}')"
    class='group/accordion-trigger focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 focus-visible:after:border-ring **:data-[slot=accordion-trigger-icon]:ml-auto **:data-[slot=accordion-trigger-icon]:size-4 **:data-[slot=accordion-trigger-icon]:text-muted-foreground relative flex w-full items-start justify-between rounded-lg border border-transparent py-2.5 text-left text-sm font-medium outline-none transition-all hover:underline disabled:pointer-events-none disabled:opacity-50'
    data-slot='accordion-trigger'
    type='button'
    x-on:click="toggle('{{ $value }}')">
    {{ $slot }}
    <x-lucide-chevron-down class='pointer-events-none shrink-0'
        data-slot='accordion-trigger-icon'
        x-bind:class="[
            isSelected('{{ $value }}') ? 'rotate-180' : '',
            $transition && 'transition-transform duration-200'
        ]"
        x-data='{ $transition: false }'
        x-init="$nextTick(() => { $transition = {{ $transition ? 'true' : 'false' }} })" />
</button>
