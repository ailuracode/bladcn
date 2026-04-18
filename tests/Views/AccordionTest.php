<?php

namespace AiluraCode\Bladcn\Tests\Views;

use AiluraCode\Bladcn\BladcnServiceProvider;
use Illuminate\View\ViewException;
use MallardDuck\LucideIcons\BladeLucideIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class AccordionTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            BladcnServiceProvider::class,
            BladeLucideIconsServiceProvider::class,
        ];
    }

    public function test_renders_accordion_wrapper(): void
    {
        $this->blade('<x-bladcn::accordion></x-bladcn::accordion>')
            ->assertSee('data-slot="accordion"', false)
            ->assertSee('data-type="multiple"', false);
    }

    public function test_renders_single_type(): void
    {
        $this->blade('<x-bladcn::accordion type="single"></x-bladcn::accordion>')
            ->assertSee('data-type="single"', false);
    }

    public function test_renders_multiple_type(): void
    {
        $this->blade('<x-bladcn::accordion type="multiple"></x-bladcn::accordion>')
            ->assertSee('data-type="multiple"', false);
    }

    public function test_renders_accordion_item(): void
    {
        $this->blade('
            <x-bladcn::accordion>
                <x-bladcn::accordion.item value="item-1">
                    Content here
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('data-slot="accordion-item"', false)
            ->assertSee('data-accordion-value="item-1"', false);
    }

    public function test_renders_accordion_trigger(): void
    {
        $this->blade('
            <x-bladcn::accordion>
                <x-bladcn::accordion.item value="item-1">
                    <x-bladcn::accordion.trigger>
                        Click me
                    </x-bladcn::accordion.trigger>
                    <x-bladcn::accordion.content>
                        Content
                    </x-bladcn::accordion.content>
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('data-slot="accordion-trigger"', false)
            ->assertSee('Click me');
    }

    public function test_renders_accordion_content(): void
    {
        $this->blade('
            <x-bladcn::accordion>
                <x-bladcn::accordion.item value="item-1">
                    <x-bladcn::accordion.trigger>Trigger</x-bladcn::accordion.trigger>
                    <x-bladcn::accordion.content>
                        Hidden content
                    </x-bladcn::accordion.content>
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('data-slot="accordion-content"', false)
            ->assertSee('Hidden content');
    }

    public function test_accepts_custom_class(): void
    {
        $this->blade('<x-bladcn::accordion class="my-accordion"></x-bladcn::accordion>')
            ->assertSee('my-accordion');
    }

    public function test_accepts_custom_id(): void
    {
        $this->blade('<x-bladcn::accordion id="custom-id"></x-bladcn::accordion>')
            ->assertSee('id="custom-id"', false);
    }

    public function test_item_accepts_custom_class(): void
    {
        $this->blade('
            <x-bladcn::accordion>
                <x-bladcn::accordion.item value="item-1" class="my-item">
                    Content
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('my-item');
    }

    public function test_trigger_accepts_disabled(): void
    {
        $this->blade('
            <x-bladcn::accordion>
                <x-bladcn::accordion.item value="item-1">
                    <x-bladcn::accordion.trigger disabled>
                        Disabled trigger
                    </x-bladcn::accordion.trigger>
                    <x-bladcn::accordion.content>Content</x-bladcn::accordion.content>
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('disabled', false)
            ->assertSee('data-disabled', false);
    }

    public function test_has_alpine_x_data(): void
    {
        $this->blade('<x-bladcn::accordion></x-bladcn::accordion>')
            ->assertSee('x-data="accordion(', false);
    }

    public function test_invalid_type_throws_exception(): void
    {
        $this->expectException(ViewException::class);

        $this->blade('<x-bladcn::accordion type="invalid"></x-bladcn::accordion>');
    }

    public function test_full_accordion_with_multiple_items(): void
    {
        $this->blade('
            <x-bladcn::accordion>
                <x-bladcn::accordion.item value="item-1">
                    <x-bladcn::accordion.trigger>First</x-bladcn::accordion.trigger>
                    <x-bladcn::accordion.content>First content</x-bladcn::accordion.content>
                </x-bladcn::accordion.item>
                <x-bladcn::accordion.item value="item-2">
                    <x-bladcn::accordion.trigger>Second</x-bladcn::accordion.trigger>
                    <x-bladcn::accordion.content>Second content</x-bladcn::accordion.content>
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('data-slot="accordion"', false)
            ->assertSee('data-slot="accordion-item"', false)
            ->assertSee('data-accordion-value="item-1"', false)
            ->assertSee('data-accordion-value="item-2"', false)
            ->assertSee('First')
            ->assertSee('Second');
    }

    public function test_content_has_x_collapse_when_transition_true(): void
    {
        $this->blade('
            <x-bladcn::accordion transition>
                <x-bladcn::accordion.item value="item-1">
                    <x-bladcn::accordion.trigger>Trigger</x-bladcn::accordion.trigger>
                    <x-bladcn::accordion.content>Content</x-bladcn::accordion.content>
                </x-bladcn::accordion.item>
            </x-bladcn::accordion>
        ')
            ->assertSee('x-collapse', false);
    }
}