@props([
    'showCollapse' => false,
    'showCopy' => false,
])

@php
    $attrs = [
        'data-slot' => 'highlighted-code-toolbar',
    ];
@endphp

@if ($slot->isNotEmpty() || $showCopy)
    <div {{ $attributes->merge($attrs)->class(['flex items-center px-4 py-1 min-h-10']) }}
        style="background-color: #17191e">
        @if ($slot->isNotEmpty())
            <x-bladcn::typography.muted class="flex w-full items-center gap-2">
                {{ $slot }}
            </x-bladcn::typography.muted>
        @endif

        @if ($showCollapse || $showCopy)
            <span class='ml-auto flex items-center gap-2'
                data-slot="code-actions">
                @if ($showCopy)
                    <x-bladcn::button size="sm"
                        variant="ghost"
                        x-on:click="expanded = !expanded"
                        x-text="expanded ? 'Collapse': 'Expanded'" />
                @endif

                @if ($showCopy)
                    <x-bladcn::button
                        class="text-muted-foreground relative inline-flex size-3.5 items-center justify-center"
                        size="icon-sm"
                        variant="ghost"
                        x-bind:disabled="isCopied"
                        x-data="buttonCopyCode"
                        x-on:click="copy">
                        <span class="absolute"
                            x-show="!isCopied"
                            x-transition.opacity>
                            <x-lucide-copy />
                        </span>

                        <span class="absolute"
                            x-show="isCopied"
                            x-transition.opacity>
                            <x-lucide-check />
                        </span>
                    </x-bladcn::button>
                @endif
            </span>
        @endif
    </div>
@endif

@pushonce('bladcn-scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('buttonCopyCode', () => ({
                isCopied: false,

                copy() {
                    const wrapper = this.$el.closest(
                        '[data-slot="highlighted-code-content"]'
                    );
                    const codeBlock = wrapper?.querySelector(
                        '[data-slot="highlighted-code-block"]'
                    );
                    if (!codeBlock) return;
                    const code = codeBlock.dataset.code;
                    if (navigator.clipboard && navigator
                        .clipboard.writeText) {
                        navigator.clipboard.writeText(code);
                    } else {
                        const textarea = document.createElement(
                            'textarea');
                        textarea.value = code;
                        document.body.appendChild(textarea);
                        textarea.select();
                        document.execCommand('copy');
                        textarea.remove();
                    }
                    this.isCopied = true;

                    setTimeout(() => {
                        this.isCopied = false;
                    }, 2000);
                }
            }));
        });
    </script>
@endpushonce
