<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Tests\Views;

use AiluraCode\Bladcn\BladcnServiceProvider;
use Orchestra\Testbench\TestCase;

final class AvatarTest extends TestCase
{
    public function test_renders_default_avatar(): void
    {
        $this->blade('<x-bladcn::avatar>content</x-bladcn::avatar>')
            ->assertSee('data-slot="avatar"', false)
            ->assertSee('data-size="default"', false);
    }

    public function test_renders_custom_size(): void
    {
        $this->blade('<x-bladcn::avatar size="lg">content</x-bladcn::avatar>')
            ->assertSee('data-size="lg"', false);
    }

    public function test_renders_custom_class(): void
    {
        $this->blade('<x-bladcn::avatar class="my-custom">content</x-bladcn::avatar>')
            ->assertSee('my-custom');
    }

    public function test_renders_image(): void
    {
        $this->blade('<x-bladcn::avatar><x-bladcn::avatar.image src="/test.jpg" alt="Test" /></x-bladcn::avatar>')
            ->assertSee('src="/test.jpg"', false)
            ->assertSee('alt="Test"', false)
            ->assertSee('data-slot="avatar-image"', false);
    }

    public function test_renders_fallback(): void
    {
        $this->blade('<x-bladcn::avatar><x-bladcn::avatar.fallback>JD</x-bladcn::avatar.fallback></x-bladcn::avatar>')
            ->assertSee('data-slot="avatar-fallback"', false)
            ->assertSee('JD');
    }

    public function test_renders_badge(): void
    {
        $this->blade('<x-bladcn::avatar><x-bladcn::avatar.badge>1</x-bladcn::avatar.badge></x-bladcn::avatar>')
            ->assertSee('data-slot="avatar-badge"', false)
            ->assertSee('1');
    }

    public function test_renders_group(): void
    {
        $this->blade('<x-bladcn::avatar.group>content</x-bladcn::avatar.group>')
            ->assertSee('data-slot="avatar-group"', false);
    }

    public function test_renders_group_count(): void
    {
        $this->blade('<x-bladcn::avatar.group-count>+3</x-bladcn::avatar.group-count>')
            ->assertSee('data-slot="avatar-group-count"', false)
            ->assertSee('+3');
    }

    public function test_renders_full_avatar_component(): void
    {
        $this->blade('
            <x-bladcn::avatar size="sm">
                <x-bladcn::avatar.image src="/avatar.jpg" alt="User" />
                <x-bladcn::avatar.fallback>U</x-bladcn::avatar.fallback>
                <x-bladcn::avatar.badge>
                    <svg></svg>
                </x-bladcn::avatar.badge>
            </x-bladcn::avatar>
        ')
            ->assertSee('data-size="sm"', false)
            ->assertSee('data-slot="avatar"', false)
            ->assertSee('data-slot="avatar-image"', false)
            ->assertSee('data-slot="avatar-fallback"', false)
            ->assertSee('data-slot="avatar-badge"', false)
            ->assertSee('src="/avatar.jpg"', false)
            ->assertSee('alt="User"', false);
    }

    public function test_renders_avatar_group_with_count(): void
    {
        $this->blade('
            <x-bladcn::avatar.group>
                <x-bladcn::avatar>
                    <x-bladcn::avatar.fallback>A</x-bladcn::avatar.fallback>
                </x-bladcn::avatar>
                <x-bladcn::avatar.group-count>+2</x-bladcn::avatar.group-count>
            </x-bladcn::avatar.group>
        ')
            ->assertSee('data-slot="avatar-group"', false)
            ->assertSee('data-slot="avatar-group-count"', false)
            ->assertSee('+2');
    }

    public function test_image_error_triggers_fallback(): void
    {
        $this->blade('
            <x-bladcn::avatar>
                <x-bladcn::avatar.image src="/broken.jpg" alt="Broken" />
                <x-bladcn::avatar.fallback>FB</x-bladcn::avatar.fallback>
            </x-bladcn::avatar>
        ')
            ->assertSee('data-slot="avatar-image"', false)
            ->assertSee('data-slot="avatar-fallback"', false)
            ->assertSee("window._bladcnSlots.push('avatar')", false);
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladcnServiceProvider::class,
        ];
    }
}
