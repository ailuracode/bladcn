@props([
    'errors' => [],
])

@php
    $content = trim($slot);

    if (!$content) {
        $messages = collect($errors)
            ->filter()
            ->pluck('message')
            ->filter()
            ->unique()
            ->values();

        if ($messages->isEmpty()) {
            $content = null;
        } elseif ($messages->count() === 1) {
            $content = $messages->first();
        } else {
            $content = $messages;
        }
    }
@endphp

@if ($content)
    <div {{ $attributes->class('text-destructive text-sm font-normal') }}
        data-slot="field-error"
        role="alert">
        @if (is_string($content))
            {{ $content }}
        @else
            <ul class="ml-4 flex list-disc flex-col gap-1">
                @foreach ($content as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif
