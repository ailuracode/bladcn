@aware([
    'value' => null,
    'defaultValue' => null,
    'transition' => false,
])

<div @if (!in_array($value, (array) $defaultValue)) x-cloak @endif
    @if ($transition) x-collapse
    @else
        x-collapse.duration.0ms @endif
    @class(['overflow-hidden text-sm'])
    data-slot='accordion-content'
    x-show="isSelected('{{ $value }}')">
    <div @class([
        'pb-2.5 pt-0',
        '[&_a]:underline [&_a]:underline-offset-3 [&_a]:hover:text-foreground',
        '[&_p:not(:last-child)]:mb-4',
    ])>
        {{ $slot }}
    </div>
</div>
