@aware([
    'value' => null,
])

<div class="overflow-hidden text-sm" data-slot="accordion-content" x-show="isSelected('{{ $value }}')" x-collapse>
    <div
        class="[&_a]:hover:text-foreground [&_a]:underline-offset-3 pb-2.5 pt-0 [&_a]:underline [&_p:not(:last-child)]:mb-4">
        {{ $slot }}
    </div>
</div>
