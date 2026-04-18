@blaze(fold: true)

@aware([
    'persistent' => false,
    'transition' => true,
])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
])

@php
    bladcnOptionsValidator('alert-dialog.content', [
        'size' => ['value' => $size, 'options' => ['default', 'sm']],
    ]);

    $overlayBase =
        'bg-black/10 supports-backdrop-filter:backdrop-blur-xs fixed inset-0 z-50 flex items-center justify-center';
    $contentBase =
        'bg-background ring-foreground/10 rounded-xl p-4 ring-1 w-full relative group/alert-dialog-content';
    $overlayAttrs = [
        'x-cloak' => '',
        'x-show' => 'open',
        'data-slot' => 'alert-dialog-overlay',
    ];
    $contentAttrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size,
        'data-slot' => 'alert-dialog-content',
        'x-on:click.away' => 'handleEvent("overlay-click")',
        'x-on:keydown.escape.window' => 'handleEvent("escape")',
    ];
    if ($transition) {
        $contentAttrs['x-transition:enter'] = 'ease-out duration-200';
        $contentAttrs['x-transition:leave'] = 'ease-in duration-150';
    }
@endphp

<div data-slot="alert-dialog-portal">
    <div {{ $attributes->class([$overlayBase])->merge($overlayAttrs) }}>
        <div {{ $attributes->class([$contentBase, $size, $class, $transition ? 'transition' : ''])->merge($contentAttrs) }}
            x-show="open"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:leave-end="opacity-0 scale-95"
            x-transition:leave-start="opacity-100 scale-100">
            {{ $slot }}
        </div>
    </div>
</div>
