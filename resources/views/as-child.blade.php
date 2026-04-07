@blaze(fold: true)

@use(AiluraCode\Bladcn\Support\AsChildParser)

@props([
    'tag' => 'div',
    'class' => null,
    'attrs' => [],
    'asChild' => false,
])

@php
    $boundAttrs = $attributes->getAttributes();
    $parentAttrs = array_merge($attrs, $boundAttrs);

    $slotAttributes = null;

    if ($asChild) {
        $slotAttributes = AsChildParser::parse((string) $slot, $parentAttrs);
    }

    $renderTag = $slotAttributes ? $slotAttributes['tag'] : $tag;

    $classes = is_array($class) ? $class : [$class];
    if ($slotAttributes) {
        $childClass = $slotAttributes['attrs']['class'] ?? null;
        if ($childClass) {
            $classes[] = $childClass;
        }
    } elseif ($boundAttrs['class'] ?? null) {
        $classes[] = $boundAttrs['class'];
    }

    $finalAttrs = [];

    if ($slotAttributes) {
        $childAttrs = $slotAttributes['attrs'];
        unset($childAttrs['class']);

        foreach ($childAttrs as $k => $v) {
            if (!isset($parentAttrs[$k])) {
                $finalAttrs[$k] = $v;
            }
        }
    }

    foreach ($parentAttrs as $k => $v) {
        if ($k !== 'class') {
            $finalAttrs[$k] = $v;
        }
    }

    $tagsWithType = ['button', 'input', 'select', 'textarea'];
    $tagsWithDisabled = [
        'button',
        'input',
        'select',
        'textarea',
        'fieldset',
        'optgroup',
        'option',
    ];
    $childTag = $slotAttributes ? $slotAttributes['tag'] : null;

    if ($slotAttributes) {
        if (isset($finalAttrs['type']) && !in_array($childTag, $tagsWithType)) {
            unset($finalAttrs['type']);
        }

        if (
            isset($finalAttrs['disabled']) &&
            !in_array($childTag, $tagsWithDisabled)
        ) {
            unset($finalAttrs['disabled']);
        }
    }
@endphp

@if ($slotAttributes)
    {{-- prettier-ignore-start --}}
    <{{ $renderTag }} {{ $attributes->class($classes)->merge($finalAttrs) }}>
    {{-- prettier-ignore-end  --}}
    {!! $slotAttributes['innerHtml'] !!}
    {{-- prettier-ignore-start --}}
    </{{ $renderTag }}>
    {{-- prettier-ignore-end  --}}
@else
    {{-- prettier-ignore-start --}}
    <{{ $renderTag }} {{ $attributes->class($classes)->merge($finalAttrs) }}>
    {{-- prettier-ignore-end  --}}
    {{ $slot }}
    {{-- prettier-ignore-start --}}
    </{{ $renderTag }}>
    {{-- prettier-ignore-end  --}}
@endif
