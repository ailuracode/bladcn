@use(Spatie\ShikiPhp\Shiki)

@props([
    'id' => null,
    'style' => null,
    'class' => null,
    'language' => 'html',
    'theme' => 'min-dark',
    'showNumbers' => true,
    'copyable' => false,
])

@php
    $content = trim($slot);
    $highlightedCode = Shiki::highlight($content, $language, $theme);

    $attrs = [
        'id' => $id,
        'style' => $style,
        'class' => $class,
        'data-slot' => 'highlighted-code-block',
        'data-language' => $language,
        'data-theme' => $theme,
        'data-show-numbers' => $showNumbers,
    ];
@endphp

<div {{ $attributes->merge($attrs) }}
    data-code="{{ $content }}">
    {!! $highlightedCode !!}
</div>
