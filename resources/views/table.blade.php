@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
])

@php
    $containerClasses = ['relative w-full overflow-x-auto', $class];
    $tableClasses = ['w-full caption-bottom text-sm'];
@endphp

<div {{ $attributes->class($containerClasses) }}
    data-slot="table-container"
    id="{{ $id }}">
    <table {{ $attributes->class($tableClasses)->except('id') }}
        data-slot="table">
        {{ $slot }}
    </table>
</div>
