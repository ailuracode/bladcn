@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'defaultChecked' => false,
    'disabled' => false,
    'transition' => true,
])

@php
    bladcnOptionsValidator('checkbox', [
        'default-checked' => [
            'value' => $defaultChecked,
            'options' => [true, false],
        ],
        'disabled' => ['value' => $disabled, 'options' => [true, false]],
        'transition' => ['value' => $transition, 'options' => [true, false]],
    ]);

    $inputClass =
        'peer appearance-none absolute inset-0 m-0 size-full rounded-[4px] border border-input bg-transparent cursor-pointer dark:bg-input/30 checked:bg-primary checked:border-primary focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-2 aria-[invalid]:border-destructive aria-[invalid]:ring-2 aria-[invalid]:ring-destructive/40 dark:aria-[invalid]:border-destructive/50 group-data-[disabled=true]/field:opacity-50 disabled:cursor-not-allowed disabled:opacity-50' .
        ($transition ? ' transition-all duration-200 ease-in-out' : '');

    $indicatorClass =
        'pointer-events-none absolute size-3.5 scale-75 text-black opacity-0 peer-checked:scale-100 peer-checked:opacity-100' .
        ($transition ? ' transition-all duration-200 ease-in-out' : '');

    $checkboxAttrs = [
        'data-slot' => 'checkbox',
        'data-disabled' => $disabled ? 'true' : null,
        'style' => $style,
        'class' =>
            'relative inline-flex size-4 items-center justify-center ' . $class,
    ];

    $checkboxInputAttrs = [
        'id' => $id,
        'style' => $style,
        'disabled' => $disabled ?: null,
        'checked' => $defaultChecked,
        'type' => 'checkbox',
        'data-slot' => 'checkbox-control',
        'class' => $inputClass,
    ];
@endphp

<span
    {{ $attributes->except(['aria-invalid'])->whereDoesntStartWith(['x-on:', 'wire:', '@'])->merge($checkboxAttrs) }}>
    <input {{ $attributes->except(['class'])->merge($checkboxInputAttrs) }} />
    <x-lucide-check @class([$indicatorClass])
        data-slot="checkbox-indicator" />
</span>
