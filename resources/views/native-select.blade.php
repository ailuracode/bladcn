@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
    'disabled' => false,
])

@php
    $wrapperBase =
        'group/native-select relative w-fit has-[select:disabled]:opacity-50';
    $selectBase =
        'border-input placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 dark:text-foreground bg-background text-foreground dark:focus:bg-input/50 focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 h-8 w-full min-w-0 appearance-none rounded-lg border py-1 pr-8 pl-2.5 text-sm transition-colors select-none focus-visible:ring-3 aria-invalid:ring-3 data-[size=sm]:h-7 data-[size=sm]:rounded-[min(var(--radius-md),10px)] data-[size=sm]:py-0.5 outline-none disabled:pointer-events-none disabled:cursor-not-allowed';
    $wrapperClasses = [$wrapperBase, $class];
    $wrapperAttrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size,
        'data-slot' => 'native-select-wrapper',
    ];
    $selectAttrs = [
        'data-size' => $size,
        'data-slot' => 'native-select',
        'aria-invalid' => $attributes->hasAny('data-invalid', 'aria-invalid')
            ? 'true'
            : null,
    ];
@endphp

<div {{ $attributes->class($wrapperClasses)->merge($wrapperAttrs) }}>
    <select
        {{ $attributes->except('class')->class([$selectBase])->merge($selectAttrs) }}
        @disabled($disabled)>{{ $slot }}</select>
    <x-lucide-chevron-down
        class="text-muted-foreground pointer-events-none absolute right-2.5 top-1/2 h-4 w-4 -translate-y-1/2 select-none" />
</div>
