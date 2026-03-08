@props([
    'value' => false,
    'size' => 'default',
    'disabled' => false,
])

<span class="relative inline-flex"
    x-data="{ checked: @js($value) }">
    <input
        {{ $attributes->class([
            'absolute inset-0 w-full h-full opacity-0 z-10',
            'cursor-not-allowed' => $disabled,
        ]) }}
        @checked($value)
        @disabled($disabled)
        role="switch"
        type="checkbox"
        x-model="checked"
        x-ref="switch" />

    <span :data-checked="checked || null"
        :data-unchecked="!checked || null"
        {{ $disabled ? 'data-disabled' : null }}
        {{ $value ? 'data-checked' : 'data-unchecked' }}
        aria-hidden="true"
        class="group/switch data-checked:bg-primary data-unchecked:bg-input dark:data-unchecked:bg-input/80 focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-3 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 aria-invalid:ring-3 data-disabled:cursor-not-allowed data-disabled:opacity-50 relative inline-flex shrink-0 items-center rounded-full border border-transparent outline-none transition-all after:absolute after:-inset-x-3 after:-inset-y-2 data-[size=default]:h-[18.4px] data-[size=sm]:h-[14px] data-[size=default]:w-[32px] data-[size=sm]:w-[24px]"
        data-size="{{ $size }}">

        <span :data-checked="checked || null"
            :data-unchecked="!checked || null"
            {{ $disabled ? 'data-disabled' : null }}
            {{ $value ? 'data-checked' : 'data-unchecked' }}
            class="bg-background dark:data-unchecked:bg-foreground dark:data-checked:bg-primary-foreground group-data-[size=default]/switch:data-checked:translate-x-[calc(100%-2px)] group-data-[size=sm]/switch:data-checked:translate-x-[calc(100%-2px)] group-data-[size=default]/switch:data-unchecked:translate-x-0 group-data-[size=sm]/switch:data-unchecked:translate-x-0 pointer-events-none block rounded-full ring-0 transition-transform group-data-[size=default]/switch:size-4 group-data-[size=sm]/switch:size-3">
        </span>
    </span>
</span>
