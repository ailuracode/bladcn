@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Table\Scope)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'colspan' => null,
    'rowspan' => null,
    'scope' => null,
    'headers' => null,
    'abbr' => null,
])

@php
    $classes = [
        'text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&:has([role=checkbox])]:pr-0',
        $class,
    ];
    $colspan = is_numeric($colspan) && $colspan > 1 ? (int) $colspan : null;
    $rowspan = is_numeric($rowspan) && $rowspan > 1 ? (int) $rowspan : null;
    $scope = $scope instanceof Scope ? $scope : Scope::tryFrom($scope);

    $headAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-head',
        'colspan' => $colspan,
        'rowspan' => $rowspan,
        'scope' => $scope?->value,
        'headers' => $headers,
        'abbr' => $abbr,
    ];
@endphp

<th {{ $attributes->class($classes)->merge($headAttrs) }}>
    {{ $slot }}
</th>
