<?php

namespace AiluraCode\Bladcn\Tests\Views;

use AiluraCode\Bladcn\BladcnServiceProvider;
use Illuminate\View\ViewException;
use Orchestra\Testbench\TestCase;

class AlertDialogTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            BladcnServiceProvider::class,
        ];
    }

    public function test_renders_alert_dialog_wrapper(): void
    {
        $this->blade('<x-bladcn::alert-dialog></x-bladcn::alert-dialog>')
            ->assertSee('data-slot="alert-dialog"', false);
    }

    public function test_accepts_custom_id(): void
    {
        $this->blade('<x-bladcn::alert-dialog id="custom-id"></x-bladcn::alert-dialog>')
            ->assertSee('id="custom-id"', false);
    }

    public function test_accepts_custom_class(): void
    {
        $this->blade('<x-bladcn::alert-dialog class="my-dialog"></x-bladcn::alert-dialog>')
            ->assertSee('my-dialog');
    }

    public function test_accepts_open_prop(): void
    {
        $this->blade('<x-bladcn::alert-dialog :open="true"></x-bladcn::alert-dialog>')
            ->assertSee('x-data="alertDialog(', false);
    }

    public function test_accepts_persistent_prop(): void
    {
        $this->blade('<x-bladcn::alert-dialog :persistent="true"></x-bladcn::alert-dialog>')
            ->assertSee('x-data="alertDialog(', false);
    }

    public function test_accepts_transition_prop(): void
    {
        $this->blade('<x-bladcn::alert-dialog :transition="false"></x-bladcn::alert-dialog>')
            ->assertSee('x-data="alertDialog(', false);
    }

    public function test_invalid_open_throws_exception(): void
    {
        $this->expectException(ViewException::class);

        $this->blade('<x-bladcn::alert-dialog open="invalid"></x-bladcn::alert-dialog>');
    }

    public function test_invalid_persistent_throws_exception(): void
    {
        $this->expectException(ViewException::class);

        $this->blade('<x-bladcn::alert-dialog persistent="invalid"></x-bladcn::alert-dialog>');
    }

    public function test_renders_trigger(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.trigger>Open</x-bladcn::alert-dialog.trigger>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-trigger"', false)
            ->assertSee('Open');
    }

    public function test_trigger_accepts_as_child(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.trigger as-child>
                    <button>Open</button>
                </x-bladcn::alert-dialog.trigger>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('button', false);
    }

    public function test_renders_content(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    Content here
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-content"', false)
            ->assertSee('data-slot="alert-dialog-portal"', false)
            ->assertSee('Content here');
    }

    public function test_content_accepts_size_sm(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content size="sm">
                    Content
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-size="sm"', false);
    }

    public function test_invalid_size_throws_exception(): void
    {
        $this->expectException(ViewException::class);

        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content size="xl">
                    Content
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ');
    }

    public function test_renders_title(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.title>Title</x-bladcn::alert-dialog.title>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-title"', false)
            ->assertSee('Title');
    }

    public function test_renders_description(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.description>Description</x-bladcn::alert-dialog.description>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-description"', false)
            ->assertSee('Description');
    }

    public function test_renders_action_button(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.action>Confirm</x-bladcn::alert-dialog.action>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-action"', false)
            ->assertSee('Confirm');
    }

    public function test_action_accepts_as_child(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.action as-child>
                        <x-bladcn::button>Confirm</x-bladcn::button>
                    </x-bladcn::alert-dialog.action>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-action"', false);
    }

    public function test_renders_cancel_button(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-cancel"', false)
            ->assertSee('Cancel');
    }

    public function test_cancel_accepts_as_child(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.cancel as-child>
                        <x-bladcn::button>Cancel</x-bladcn::button>
                    </x-bladcn::alert-dialog.cancel>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog-cancel"', false);
    }

    public function test_full_alert_dialog(): void
    {
        $this->blade('
            <x-bladcn::alert-dialog>
                <x-bladcn::alert-dialog.trigger>
                    <x-bladcn::button>Open</x-bladcn::button>
                </x-bladcn::alert-dialog.trigger>
                <x-bladcn::alert-dialog.content>
                    <x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
                    <x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
                    <x-bladcn::alert-dialog.footer>
                        <x-bladcn::alert-dialog.action>OK</x-bladcn::alert-dialog.action>
                        <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
                    </x-bladcn::alert-dialog.footer>
                </x-bladcn::alert-dialog.content>
            </x-bladcn::alert-dialog>
        ')
            ->assertSee('data-slot="alert-dialog"', false)
            ->assertSee('data-slot="alert-dialog-trigger"', false)
            ->assertSee('data-slot="alert-dialog-content"', false)
            ->assertSee('data-slot="alert-dialog-title"', false)
            ->assertSee('data-slot="alert-dialog-description"', false)
            ->assertSee('data-slot="alert-dialog-footer"', false)
            ->assertSee('data-slot="alert-dialog-action"', false)
            ->assertSee('data-slot="alert-dialog-cancel"', false)
            ->assertSee('Confirm')
            ->assertSee('Are you sure?');
    }
}
