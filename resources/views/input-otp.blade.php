@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\InputOtp\Pattern)
@use(AiluraCode\Bladcn\Enums\Basic\Disabled)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'maxLength' => 6,
    'disabled' => Disabled::False,
    'pattern' => null,
    'value' => null,
    'name' => 'otp',
])

@php
    $disabled = Disabled::coerceFrom($disabled);
    $isDisabled = $disabled->isTrue();
    $pattern = Pattern::tryFrom($pattern ?? '');
    $slots = range(0, $maxLength - 1);
    $base = 'has-disabled:opacity-50 flex items-center';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'input-otp',
        'x-data' =>
            'inputOtpManager({maxLength: ' .
            $maxLength .
            ', disabled: ' .
            ($isDisabled ? 'true' : 'false') .
            ', pattern: ' .
            json_encode($pattern?->value) .
            ', initialValue: ' .
            json_encode($value) .
            '})',
        'x-init' => 'init()',
        'x-on:keydown.arrow-left' => 'focusPrev()',
        'x-on:keydown.arrow-right' => 'focusNext()',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    @foreach ($slots as $index)
        <x-bladcn::input @focus="$el.setAttribute('data-active', 'true')"
            @input="handleInput($event, {{ $index }})"
            @keydown.backspace="handleBackspace($event, {{ $index }})"
            @paste="handlePaste($event)"
            autocomplete="one-time-code"
            class="dark:bg-input/30 border-input data-[active=true]:border-ring data-[active=true]:ring-ring/50 data-[active=true]:aria-invalid:ring-destructive/20 dark:data-[active=true]:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[active=true]:aria-invalid:border-destructive data-[active=true]:ring-3 focus:border-ring focus:ring-ring/50 focus:ring-3 relative -ml-px flex size-10 items-center justify-center border text-sm font-semibold outline-none transition-all first:ml-0 first:rounded-l-lg last:rounded-r-lg focus:z-10 data-[active=true]:z-10"
            data-otp-index="{{ $index }}"
            inputmode="numeric"
            maxlength="1"
            type="text"
            x-model="values[{{ $index }}]"
            x-on:blur="$el.removeAttribute('data-active')" />
    @endforeach
    <input :value="otpValue"
        name="{{ $name }}"
        type="hidden" />
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('inputOtpManager', (config) => ({
                values: new Array(config.maxLength).fill(''),
                maxLength: config.maxLength,
                disabled: config.disabled,
                pattern: config.pattern,
                activeIndex: -1,
                init() {
                    if (config.initialValue) {
                        const chars = config.initialValue.split(
                            '');
                        for (let i = 0; i < this.maxLength &&
                            i < chars.length; i++) {
                            this.values[i] = chars[i];
                        }
                    }
                },
                get otpValue() {
                    return this.values.join('');
                },
                isValidChar(char) {
                    if (!char) return false;
                    if (this.pattern === 'DIGITS_ONLY')
                        return /^\d$/.test(char);
                    if (this.pattern === 'DIGITS_AND_CHARS')
                        return /^[a-zA-Z0-9]$/.test(char);
                    return true;
                },
                handleInput(event, index) {
                    let value = event.target.value;
                    if (value.length > 1) value = value.slice(-
                        1);
                    if (value && !this.isValidChar(value)) {
                        this.values[index] = '';
                        event.target.value = '';
                        return;
                    }
                    this.values[index] = value;
                    if (value && index < this.maxLength - 1) {
                        setTimeout(() => {
                            const nextInput = this.$el
                                .querySelector(
                                    'input[data-otp-index="' +
                                    (index + 1) +
                                    '"]');
                            if (nextInput) nextInput
                                .focus();
                        }, 0);
                    }
                },
                handleBackspace(event, index) {
                    event.preventDefault();
                    this.values[index] = '';
                    event.target.value = '';
                    if (index > 0) {
                        const prevInput = this.$el
                            .querySelector(
                                'input[data-otp-index="' + (
                                    index - 1) + '"]');
                        if (prevInput) prevInput.focus();
                    }
                },
                handlePaste(event) {
                    event.preventDefault();
                    let pastedData = event.clipboardData
                        .getData('text').trim();
                    if (this.pattern === 'DIGITS_ONLY')
                        pastedData = pastedData.replace(/\D/g,
                            '');
                    else if (this.pattern ===
                        'DIGITS_AND_CHARS') pastedData =
                        pastedData.replace(/[^a-zA-Z0-9]/g, '');
                    pastedData = pastedData.slice(0, this
                        .maxLength);
                    const inputs = this.$el.querySelectorAll(
                        'input[data-otp-index]');
                    pastedData.split('').forEach((char, i) => {
                        if (i < this.maxLength && this
                            .isValidChar(char)) {
                            this.values[i] = char;
                            inputs[i].value = char;
                        }
                    });
                    setTimeout(() => {
                        const nextEmptyIndex = this
                            .values.findIndex(v => !v);
                        const focusIndex =
                            nextEmptyIndex === -1 ? this
                            .maxLength - 1 :
                            nextEmptyIndex;
                        const focusInput = this.$el
                            .querySelector(
                                'input[data-otp-index="' +
                                focusIndex + '"]');
                        if (focusInput) focusInput
                            .focus();
                    }, 0);
                },
                focusNext() {
                    const inputs = Array.from(this.$el
                        .querySelectorAll(
                            'input[data-otp-index]'));
                    const activeIndex = inputs.indexOf(document
                        .activeElement);
                    if (activeIndex < this.maxLength - 1)
                        inputs[activeIndex + 1].focus();
                },
                focusPrev() {
                    const inputs = Array.from(this.$el
                        .querySelectorAll(
                            'input[data-otp-index]'));
                    const activeIndex = inputs.indexOf(document
                        .activeElement);
                    if (activeIndex > 0) inputs[activeIndex - 1]
                        .focus();
                },
            }));
        });
    </script>
@endonce
