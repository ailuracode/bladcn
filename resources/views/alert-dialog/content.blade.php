@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\AlertDialog\Size)
@use(AiluraCode\Bladcn\Enums\Basic\Persistent)
@use(AiluraCode\Bladcn\Enums\Basic\Transition)

@aware([
    'persistent' => Persistent::False,
    'transition' => Transition::False,
])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => Size::Default,
])

@php
    $size = Size::coerceFrom($size);
    $persistent = Persistent::coerceFrom($persistent);
    $transition = Transition::coerceFrom($transition);
    $overlayBase =
        'bg-black/10 supports-backdrop-filter:backdrop-blur-xs fixed inset-0 z-50 flex items-center justify-center';
    $contentBase =
        'bg-background ring-foreground/10 rounded-xl p-4 ring-1 w-full relative group/alert-dialog-content';
    $sizeClass = $size->toClass();
    $overlayAttrs = [
        'x-cloak' => '',
        'x-show' => 'open',
        'data-slot' => 'alert-dialog-overlay',
    ];
    $contentAttrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size->toHtml(),
        'data-slot' => 'alert-dialog-content',
        'x-on:click.away' => $persistent->isFalse() ? 'close()' : null,
        'x-on:keydown.escape.window' => $persistent->isFalse()
            ? 'close()'
            : null,
    ];
    if ($transition->isTrue()) {
        $contentAttrs['x-transition:enter'] = 'ease-out duration-200';
        $contentAttrs['x-transition:leave'] = 'ease-in duration-150';
    }
@endphp

<div data-slot="alert-dialog-portal">
    <div {{ $attributes->class([$overlayBase])->merge($overlayAttrs) }}>
        <div {{ $attributes->class([$contentBase, $sizeClass, $class, $transition->isTrue() ? 'transition' : ''])->merge($contentAttrs) }}
            x-show="open"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:leave-end="opacity-0 scale-95"
            x-transition:leave-start="opacity-100 scale-100">
            {{ $slot }}
        </div>
    </div>
</div>
