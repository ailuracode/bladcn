@aware([
    'value' => null,
    'defaultValue' => null,
    'transition' => false,
])

<div @if (!in_array($value, (array) $defaultValue)) x-cloak @endif
    class='overflow-hidden text-sm'
    data-slot='accordion-content'
    x-collapse{{ $transition ? '' : '.duration.0ms' }}
    x-show="isSelected('{{ $value }}')">
    <div
        class='[&_a]:underline-offset-3 [&_a]:hover:text-foreground pb-2.5 pt-0 [&_a]:underline [&_p:not(:last-child)]:mb-4'>
        {{ $slot }}
    </div>
</div>
