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
    'showCloseButton' => true,
])

@php
    bladcnOptionsValidator('dialog.content', [
        'size' => [
            'value' => $size,
            'options' => ['sm', 'default', 'lg', 'xl', 'full'],
        ],
        'showCloseButton' => [
            'value' => $showCloseButton,
            'options' => [true, false],
        ],
    ]);
    $sizeClass = match ($size) {
        'sm' => 'sm:max-w-xs',
        'default' => 'sm:max-w-sm',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        'full' => 'max-w-[calc(100%-2rem)]',
    };
    $overlayBase =
        'bg-black/10 supports-backdrop-filter:backdrop-blur-xs fixed inset-0 z-50 flex items-center justify-center';
    $contentBase =
        'bg-background grid gap-4 ring-foreground/10 rounded-xl p-4 ring-1 w-full relative';
    $overlayAttrs = [
        'x-cloak' => '',
        'x-show' => 'open',
        'data-slot' => 'dialog-overlay',
    ];
    $contentAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'dialog-content',
        'data-size' => $size,
        'class' => $sizeClass,
    ];
    if ($transition) {
        $contentAttrs['x-transition:enter'] = 'ease-out duration-200';
        $contentAttrs['x-transition:enter-end'] = 'opacity-100 scale-100';
        $contentAttrs['x-transition:enter-start'] = 'opacity-0 scale-95';
        $contentAttrs['x-transition:leave'] = 'ease-in duration-150';
        $contentAttrs['x-transition:leave-end'] = 'opacity-0 scale-95';
        $contentAttrs['x-transition:leave-start'] = 'opacity-100 scale-100';
    }
@endphp

<div data-slot="dialog-portal">
    <div {{ $attributes->class([$overlayBase])->merge($overlayAttrs) }}>
        <div {{ $attributes->class([$contentBase, $sizeClass, $class])->merge($contentAttrs) }}
            x-on:click.away="handleEvent('overlay-click')"
            x-on:keydown.escape.window="handleEvent('escape')"
            x-show="open">
            {{ $slot }}
            @if ($showCloseButton)
                <x-bladcn::button aria-label="Close"
                    class="absolute right-2 top-2"
                    size="icon-sm"
                    variant="ghost"
                    x-on:click="close()">
                    <x-lucide-x class="h-4 w-4" />
                </x-bladcn::button>
            @endif
        </div>
    </div>
</div>
