@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'errors' => [],
    'issues' => [],
])

@php
    $content = trim($slot);

    if (!$content) {
        $allErrors = collect($errors)->merge(collect($issues));

        if (is_object($allErrors) && method_exists($allErrors, 'toArray')) {
            $allErrors = $allErrors->toArray();
        }

        $messages = collect($allErrors)
            ->filter()
            ->map(function ($error) {
                if (is_object($error)) {
                    return $error->message ?? ($error->issueMessage ?? null);
                }
                return $error ?? null;
            })
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
    <div
        {{ $attributes->class(['text-destructive text-sm font-normal', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'field-error', 'role' => 'alert']) }}>
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
