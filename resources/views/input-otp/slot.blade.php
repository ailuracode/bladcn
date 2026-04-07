@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'index' => 0,
])

@php
    $base =
        'dark:bg-input/30 border-input data-[active=true]:border-ring data-[active=true]:ring-ring/50 data-[active=true]:aria-invalid:ring-destructive/20 dark:data-[active=true]:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[active=true]:aria-invalid:border-destructive size-10 border-y border-r text-sm font-semibold transition-all outline-none first:rounded-l-lg first:border-l last:rounded-r-lg data-[active=true]:ring-3 relative flex items-center justify-center data-[active=true]:z-10';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'input-otp-slot',
        'data-index' => $index,
        ':data-active' => 'isActive',
        ':data-filled' => "char !== ''",
        'x-data' => 'inputOtpSlot(' . $index . ')',
        'x-init' => 'init()',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}><span class="text-center"
        x-text="char"></span><template x-if="hasFakeCaret">
        <div
            class="pointer-events-none absolute inset-0 flex items-center justify-center">
            <div :class="{ 'opacity-100': isActive, 'opacity-0': !isActive }"
                class="bg-foreground h-4 w-px animate-pulse"></div>
        </div>
    </template></div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('inputOtpSlot', (index) => ({
                index: index,
                char: '',
                hasFakeCaret: false,
                isActive: false,
                init() {
                    const rootContainer = this.$el.closest(
                        '[data-slot="input-otp"]');
                    if (rootContainer) {
                        const hiddenInput = rootContainer
                            .querySelector(
                                'input[type="hidden"]');
                        if (hiddenInput && hiddenInput.Alpine) {
                            const otpData = hiddenInput.Alpine
                                .$data;
                            if (otpData && otpData.values) {
                                this.$watch('char', () => {
                                    otpData.values[this
                                            .index] =
                                        this.char;
                                });
                            }
                        }
                    }
                },
                updateChar(newChar) {
                    this.char = newChar;
                },
                setActive(active) {
                    this.isActive = active;
                    this.hasFakeCaret = active;
                },
            }));
        });
    </script>
@endonce
