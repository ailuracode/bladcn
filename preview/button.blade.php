<x-layouts::app :title="__('Button preview')">
    <div class="space-y-10">
        <div class="flex flex-col items-start gap-5">
            <x-typography.large>{{ __('Size') }}</x-typography.large>

            <div class="flex flex-col items-start gap-8 sm:flex-row">
                <div class="flex items-start gap-2">
                    <x-button size="xs" variant="outline">
                        Extra Small
                    </x-button>
                    <x-button aria-label="Submit" size="icon-xs" variant="outline">
                        <x-lucide-arrow-up-right />
                    </x-button>
                </div>
                <div class="flex items-start gap-2">
                    <x-button size="sm" variant="outline">
                        Small
                    </x-button>
                    <x-button aria-label="Submit" size="icon-sm" variant="outline">
                        <x-lucide-arrow-up-right />
                    </x-button>
                </div>
                <div class="flex items-start gap-2">
                    <x-button variant="outline">Default</x-button>
                    <x-button aria-label="Submit" size="icon" variant="outline">
                        <x-lucide-arrow-up-right />
                    </x-button>
                </div>
                <div class="flex items-start gap-2">
                    <x-button size="lg" variant="outline">
                        Large
                    </x-button>
                    <x-button aria-label="Submit" size="icon-lg" variant="outline">
                        <x-lucide-arrow-up-right />
                    </x-button>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-start gap-5">
            <x-typography.large>{{ __('Variant') }}</x-typography.large>
            <div class="flex items-start gap-2">
                <x-button variant="default">Default</x-button>
                <x-button variant="outline">Outline</x-button>
                <x-button variant="secondary">Secondary</x-button>
                <x-button variant="ghost">Ghost</x-button>
                <x-button variant="destructive">Destructive</x-button>
                <x-button variant="link">Link</x-button>
                <x-button size="icon" variant="outline">
                    <x-lucide-circle-fading-arrow-up />
                </x-button>
            </div>
        </div>

        <div class="flex flex-col items-start gap-5">
            <x-typography.large>{{ __('With icon') }}</x-typography.large>
            <div class="flex items-start gap-2">
                <x-button size="sm" variant="outline">
                    <x-lucide-git-branch />
                    New Branch
                </x-button>
            </div>
        </div>

        <div class="flex flex-col items-start gap-5">
            <x-typography.large>{{ __('Rounded') }}</x-typography.large>
            <x-button class="rounded-full" size="icon" variant="outline">
                <x-lucide-arrow-up />
            </x-button>
        </div>

        <div class="flex flex-col items-start gap-5">
            <x-typography.large>{{ __('Spinner') }}</x-typography.large>
            <div class="flex gap-2">
                <x-button disabled variant="outline">
                    <x-spinner data-icon="inline-start" />
                    Generating
                </x-button>
                <x-button disabled variant="secondary">
                    Downloading
                    <x-spinner data-icon="inline-start" />
                </x-button>
            </div>
        </div>

        <div class="flex flex-col items-start gap-5">
            <x-typography.large>{{ __('Link') }}</x-typography.large>
            <x-button as='a' href="https://example.com" rel="noopener noreferrer" target="_blank">
                Login
            </x-button>
        </div>
    </div>
</x-layouts::app>
