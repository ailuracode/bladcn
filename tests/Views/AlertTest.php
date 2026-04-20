<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Tests\Views;

use AiluraCode\Bladcn\BladcnServiceProvider;
use Illuminate\View\ViewException;
use MallardDuck\LucideIcons\BladeLucideIconsServiceProvider;
use Orchestra\Testbench\TestCase;

final class AlertTest extends TestCase
{
    public function test_renders_default_alert(): void
    {
        $this->blade('<x-bladcn::alert></x-bladcn::alert>')
            ->assertSee('data-slot="alert"', false)
            ->assertSee('data-variant="default"', false);
    }

    public function test_renders_destructive_variant(): void
    {
        $this->blade('<x-bladcn::alert variant="destructive"></x-bladcn::alert>')
            ->assertSee('data-variant="destructive"', false);
    }

    public function test_accepts_custom_class(): void
    {
        $this->blade('<x-bladcn::alert class="my-alert"></x-bladcn::alert>')
            ->assertSee('my-alert');
    }

    public function test_accepts_custom_id(): void
    {
        $this->blade('<x-bladcn::alert id="custom-id"></x-bladcn::alert>')
            ->assertSee('id="custom-id"', false);
    }

    public function test_renders_alert_title(): void
    {
        $this->blade('
            <x-bladcn::alert>
                <x-bladcn::alert.title>Alert Title</x-bladcn::alert.title>
            </x-bladcn::alert>
        ')
            ->assertSee('data-slot="alert-title"', false)
            ->assertSee('Alert Title');
    }

    public function test_renders_alert_description(): void
    {
        $this->blade('
            <x-bladcn::alert>
                <x-bladcn::alert.description>Alert description text</x-bladcn::alert.description>
            </x-bladcn::alert>
        ')
            ->assertSee('data-slot="alert-description"', false)
            ->assertSee('Alert description text');
    }

    public function test_renders_alert_action(): void
    {
        $this->blade('
            <x-bladcn::alert>
                <x-bladcn::alert.action>Action</x-bladcn::alert.action>
            </x-bladcn::alert>
        ')
            ->assertSee('data-slot="alert-action"', false)
            ->assertSee('Action');
    }

    public function test_alert_action_accepts_as_child(): void
    {
        $this->blade('
            <x-bladcn::alert>
                <x-bladcn::alert.action as-child>
                    <button>Click me</button>
                </x-bladcn::alert.action>
            </x-bladcn::alert>
        ')
            ->assertSee('button', false);
    }

    public function test_full_alert_with_all_components(): void
    {
        $this->blade('
            <x-bladcn::alert variant="destructive">
                <x-bladcn::alert.title>Error</x-bladcn::alert.title>
                <x-bladcn::alert.description>
                    Something went wrong.
                </x-bladcn::alert.description>
                <x-bladcn::alert.action>Retry</x-bladcn::alert.action>
            </x-bladcn::alert>
        ')
            ->assertSee('data-slot="alert"', false)
            ->assertSee('data-variant="destructive"', false)
            ->assertSee('data-slot="alert-title"', false)
            ->assertSee('data-slot="alert-description"', false)
            ->assertSee('data-slot="alert-action"', false)
            ->assertSee('Error')
            ->assertSee('Something went wrong.')
            ->assertSee('Retry');
    }

    public function test_invalid_variant_throws_exception(): void
    {
        $this->expectException(ViewException::class);

        $this->blade('<x-bladcn::alert variant="invalid"></x-bladcn::alert>');
    }

    public function test_alert_has_role_alert(): void
    {
        $this->blade('<x-bladcn::alert></x-bladcn::alert>')
            ->assertSee('role="alert"', false);
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladcnServiceProvider::class,
            BladeLucideIconsServiceProvider::class,
        ];
    }
}
