@props([
    'value' => 0,
    'max' => 100,
    'indeterminate' => false,
    'transition' => false,
    'class' => '',
])

@php
    $value = (float) $value;
    $max = (float) $max;
    $state = $indeterminate ? 'indeterminate' : 'complete';
    $percentage = $indeterminate ? 0 : min(($value / $max) * 100, 100);
    $mergedClass =
        'relative flex h-1 w-full items-center overflow-x-hidden rounded-full bg-muted ' .
        $class;

    $indicatorClass = 'h-full bg-primary';
    if ($transition) {
        $indicatorClass .= ' transition-all';
    }
    $style = $indeterminate
        ? 'animation: pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite; width: 100%'
        : "width: {$percentage}%";
@endphp

<div {{ $attributes }}
    @if (!$indeterminate) aria-valuenow="{{ $value }}" @endif
    aria-valuemax="{{ $max }}"
    aria-valuemin="0"
    class="{{ $mergedClass }}"
    data-max="{{ $max }}"
    data-slot="progress"
    data-state="{{ $state }}"
    role="progressbar">
    <div class="{{ $indicatorClass }}"
        data-max="{{ $max }}"
        data-slot="progress-indicator"
        data-state="{{ $state }}"
        style="{{ $style }}">
    </div>
</div>

@once
    <script>
        window.$progress = function(elementId, newValue) {
            const element = document.getElementById(elementId);

            if (!element) {
                console.error(`Element with id "${elementId}" not found`);
                return;
            }

            const progressIndicator = element.querySelector(
                '[data-slot="progress-indicator"]',
            );
            if (!progressIndicator) {
                console.error(
                    `Progress indicator not found in element "${elementId}"`
                );
                return;
            }

            const max = parseFloat(element.getAttribute("data-max")) || 100;

            const value = Math.max(0, Math.min(newValue, max));
            const percentage = (value / max) * 100;

            element.setAttribute("aria-valuenow", value);
            element.setAttribute("data-state", "complete");

            progressIndicator.style.width = percentage + "%";
            progressIndicator.setAttribute("data-state", "complete");
        };
    </script>
@endonce
