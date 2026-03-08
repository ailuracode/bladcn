@props([
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => null,
    'defaultValue' => null,
    'orientation' => 'horizontal',
    'disabled' => false,
])

@php
    $values = $value ?? ($defaultValue ?? [$min]);
    $values = is_array($values) ? $values : [$values];

    $snap = function ($v) use ($min, $max, $step) {
        return min($max, max($min, round($v / $step) * $step));
    };
    $values = array_map($snap, $values);

    $percent = function ($v) use ($min, $max) {
        return (($v - $min) / ($max - $min)) * 100;
    };

    $percentages = array_map($percent, $values);

    $decimals = strlen((string) $step) - strpos((string) $step, '.') - 1;

    if ($orientation === 'vertical') {
        $thumbStyles = array_map(function ($p) {
            return "bottom:{$p}%; left:50%; transform:translate(-50%,50%);";
        }, $percentages);

        if (count($values) === 1) {
            $rangeStyle = "height:{$percentages[0]}%; bottom:0; width:100%;";
        } else {
            $sorted = $values;
            sort($sorted);
            $start = $percent($sorted[0]);
            $end = $percent($sorted[count($sorted) - 1]);
            $width = $end - $start;
            $rangeStyle = "bottom:{$start}%; height:{$width}%; width:100%;";
        }
    } else {
        $thumbStyles = array_map(function ($p) {
            return "left:{$p}%; top:50%; transform:translate(-50%,-50%);";
        }, $percentages);

        if (count($values) === 1) {
            $rangeStyle = "width:{$percentages[0]}%; left:0; height:100%;";
        } else {
            $sorted = $values;
            sort($sorted);
            $start = $percent($sorted[0]);
            $end = $percent($sorted[count($sorted) - 1]);
            $width = $end - $start;
            $rangeStyle = "left:{$start}%; width:{$width}%; height:100%;";
        }
    }
@endphp

<div {{ $attributes->except('class') }}
    {{ $disabled ? 'aria-disabled=true' : '' }}
    class="{{ $orientation === 'vertical' ? 'flex-col h-40 w-auto' : 'w-full' }} {{ $disabled ? 'opacity-50' : '' }} relative flex touch-none select-none items-center"
    x-data="slider({ min: {{ $min }}, max: {{ $max }}, step: {{ $step }}, orientation: '{{ $orientation }}', values: @js($values), decimals: {{ $decimals }}, disabled: {{ $disabled ? 'true' : 'false' }} })">

    <div class="bg-muted {{ $orientation === 'vertical' ? 'w-1 h-full' : 'h-1 w-full' }} relative grow overflow-hidden rounded-full"
        x-on:click="jumpTo($event)"
        x-ref="track">
        <div :style="rangeStyle()"
            class="bg-primary absolute"
            style="{{ $rangeStyle }}">
        </div>
    </div>

    @foreach ($values as $index => $val)
        <button :style="thumbStyle({{ $index }})"
            {{ $disabled ? 'disabled' : '' }}
            class="border-ring ring-ring/50 hover:ring-3 focus-visible:ring-3 focus-visible:outline-hidden absolute size-3 rounded-full border bg-white transition"
            style="{{ $thumbStyles[$index] }}"
            type="button"
            x-on:mousedown="startDrag({{ $index }}, $event)"></button>
    @endforeach
</div>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', ({
                min,
                max,
                step,
                orientation,
                values,
                decimals,
                disabled
            }) => ({
                min,
                max,
                step,
                orientation,
                values,
                decimals,
                disabled,
                track: null,
                dragging: null,

                init() {
                    this.values = this.values.map(v => this
                        .snap(v));
                    this.track = this.$refs.track;
                },

                percent(v) {
                    return ((v - this.min) / (this.max - this
                        .min)) * 100;
                },

                snap(v) {
                    const snapped = Math.min(this.max, Math.max(
                        this.min, Math.round(v / this
                            .step) * this.step));
                    return Number(snapped.toFixed(this
                        .decimals));
                },

                thumbStyle(i) {
                    const p = this.percent(this.values[i]);
                    return this.orientation === 'vertical' ?
                        `bottom:${p}%; left:50%; transform:translate(-50%,50%)` :
                        `left:${p}%; top:50%; transform:translate(-50%,-50%)`;
                },

                rangeStyle() {
                    if (this.values.length === 1) {
                        const p = this.percent(this.values[0]);
                        return this.orientation === 'vertical' ?
                            `height:${p}%; bottom:0; width:100%` :
                            `width:${p}%; left:0; height:100%`;
                    }
                    const sorted = [...this.values].sort((a,
                        b) => a - b);
                    const start = this.percent(sorted[0]);
                    const end = this.percent(sorted[sorted
                        .length - 1]);
                    return this.orientation === 'vertical' ?
                        `bottom:${start}%; height:${end - start}%; width:100%` :
                        `left:${start}%; width:${end - start}%; height:100%`;
                },

                startDrag(index, _e) {
                    if (this.disabled) return;
                    this.dragging = index;

                    const move = (ev) => {
                        const rect = this.track
                            .getBoundingClientRect();
                        let percent = this.orientation ===
                            'vertical' ?
                            (rect.bottom - ev.clientY) /
                            rect.height :
                            (ev.clientX - rect.left) / rect
                            .width;
                        percent = Math.max(0, Math.min(1,
                            percent));
                        this.values[index] = this.snap(this
                            .min + percent * (this.max -
                                this.min));
                        this.dispatchInput();
                    };

                    const up = () => {
                        window.removeEventListener(
                            'mousemove', move);
                        window.removeEventListener(
                            'mouseup', up);
                        this.dispatchChange();
                        this.dragging = null;
                    };

                    window.addEventListener('mousemove', move);
                    window.addEventListener('mouseup', up);
                },

                jumpTo(e) {
                    if (this.disabled) return;
                    const rect = this.track
                        .getBoundingClientRect();
                    let percent = this.orientation ===
                        'vertical' ?
                        (rect.bottom - e.clientY) / rect
                        .height :
                        (e.clientX - rect.left) / rect.width;
                    percent = Math.max(0, Math.min(1, percent));
                    const clickedValue = this.min + percent * (
                        this.max - this.min);

                    let closestIndex = 0;
                    let closestDiff = Math.abs(this.values[0] -
                        clickedValue);
                    this.values.forEach((v, i) => {
                        const diff = Math.abs(v -
                            clickedValue);
                        if (diff < closestDiff) {
                            closestDiff = diff;
                            closestIndex = i;
                        }
                    });

                    this.values[closestIndex] = this.snap(
                        clickedValue);
                    this.dispatchInput();
                    this.dispatchChange();
                },

                dispatchInput() {
                    this.$el.dispatchEvent(new CustomEvent(
                        'input', {
                            bubbles: true,
                            detail: {
                                value: this.values
                            }
                        }));
                },

                dispatchChange() {
                    this.$el.dispatchEvent(new CustomEvent(
                        'change', {
                            bubbles: true,
                            detail: {
                                value: this.values
                            }
                        }));
                }
            }));
        });
    </script>
@endonce
