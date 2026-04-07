@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Disabled)
@use(AiluraCode\Bladcn\Enums\Switch\Size)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'value' => false,
    'size' => Size::Default,
    'disabled' => Disabled::False,
])

@php
    $size = Size::coerceFrom($size);
    $disabled = Disabled::coerceFrom($disabled);
    $isDisabled = $disabled->isTrue();
    $isChecked = (bool) $value;
    $inputBase =
        'absolute inset-0 w-full h-full opacity-0 z-10 cursor-not-allowed';
    $trackBase =
        'group/switch data-checked:bg-primary data-unchecked:bg-input dark:data-unchecked:bg-input/80 focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-3 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 aria-invalid:ring-3 data-disabled:cursor-not-allowed data-disabled:opacity-50 relative inline-flex shrink-0 items-center rounded-full border border-transparent outline-none transition-all after:absolute after:-inset-x-3 after:-inset-y-2 data-[size=default]:h-[18.4px] data-[size=sm]:h-[14px] data-[size=default]:w-[32px] data-[size=sm]:w-[24px]';
    $thumbBase =
        'bg-background dark:data-unchecked:bg-foreground dark:data-checked:bg-primary-foreground group-data-[size=default]/switch:data-checked:translate-x-[calc(100%-2px)] group-data-[size=sm]/switch:data-checked:translate-x-[calc(100%-2px)] group-data-[size=default]/switch:data-unchecked:translate-x-0 group-data-[size=sm]/switch:data-unchecked:translate-x-0 pointer-events-none block rounded-full ring-0 transition-transform group-data-[size=default]/switch:size-4 group-data-[size=sm]/switch:size-3';
    $inputClasses = [$inputBase];
    $trackClasses = [$trackBase];
    $thumbClasses = [$thumbBase];
    $inputAttrs = [
        'id' => $id,
        'type' => 'checkbox',
        'role' => 'switch',
        'data-slot' => 'switch',
        'data-size' => $size->toHtml(),
    ];
    $trackAttrs = [
        ':data-checked' => 'checked || null',
        ':data-unchecked' => '!checked || null',
        $isDisabled ? 'data-disabled' : '' => $isDisabled ? true : null,
        $isChecked ? 'data-checked' : 'data-unchecked' => true,
        'aria-hidden' => 'true',
        'data-size' => $size->toHtml(),
    ];
    $thumbAttrs = [
        ':data-checked' => 'checked || null',
        ':data-unchecked' => '!checked || null',
        $isDisabled ? 'data-disabled' : '' => $isDisabled ? true : null,
        $isChecked ? 'data-checked' : 'data-unchecked' => true,
    ];
@endphp

<span class="relative inline-flex"
    x-data="{ checked: @js($isChecked) }"><input
        {{ $attributes->class($inputClasses)->merge($inputAttrs) }}
        @checked($isChecked)
        @disabled($isDisabled)
        x-model="checked"
        x-ref="switch" /><span
        {{ $attributes->class($trackClasses)->merge($trackAttrs) }}><span
            {{ $attributes->class($thumbClasses)->merge($thumbAttrs) }}></span></span></span>
