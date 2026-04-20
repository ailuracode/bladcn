<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Tests\Views;

use AiluraCode\Bladcn\BladcnServiceProvider;
use Orchestra\Testbench\TestCase;

final class AspectRatioTest extends TestCase
{
    public function test_renders_default_aspect_ratio(): void
    {
        $this->blade('<x-bladcn::aspect-ratio>content</x-bladcn::aspect-ratio>')
            ->assertSee('[&>*]:aspect-square')
            ->assertSee('data-slot="aspect-ratio"', false);
    }

    public function test_renders_custom_ratio(): void
    {
        $this->blade('<x-bladcn::aspect-ratio ratio="16/9">content</x-bladcn::aspect-ratio>')
            ->assertSee('[&>*]:aspect-16/9');
    }

    public function test_renders_custom_class(): void
    {
        $this->blade('<x-bladcn::aspect-ratio class="my-custom">content</x-bladcn::aspect-ratio>')
            ->assertSee('my-custom');
    }

    public function test_renders_custom_id(): void
    {
        $this->blade('<x-bladcn::aspect-ratio id="my-id">content</x-bladcn::aspect-ratio>')
            ->assertSee('id="my-id"', false);
    }

    public function test_renders_custom_style(): void
    {
        $this->blade('<x-bladcn::aspect-ratio style="margin: 10px">content</x-bladcn::aspect-ratio>')
            ->assertSee('style="margin: 10px"', false);
    }

    public function test_renders_slot_content(): void
    {
        $this->blade('<x-bladcn::aspect-ratio><img src="test.jpg" /></x-bladcn::aspect-ratio>')
            ->assertSee('<img src="test.jpg" />', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $this->blade('<x-bladcn::aspect-ratio data-testid="ratio">content</x-bladcn::aspect-ratio>')
            ->assertSee('data-testid="ratio"', false);
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladcnServiceProvider::class,
        ];
    }
}
