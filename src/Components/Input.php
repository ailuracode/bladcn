<?php

namespace AiluraCode\BladCN\Components;

use Illuminate\View\Component;

/**
 * BladCN Styled Input Component
 *
 * Styled form input component with support for various input types.
 * Only accessible through BladCN ecosystem via <x-bladcn:input>.
 *
 * Note: BlaseUI doesn't have Input component yet, so BladCN provides it.
 * Once BlaseUI has Input, this should extend from it.
 *
 * @property string|null $id - Input ID
 * @property string|null $name - Input name attribute
 * @property string $type - Input type (text, email, password, etc.)
 * @property string|null $placeholder - Placeholder text
 * @property string|null $value - Current value
 * @property bool $disabled - Whether input is disabled
 * @property bool $required - Whether input is required
 */
class Input extends Component
{
    public ?string $id = null;
    public ?string $name = null;
    public string $type = 'text';
    public ?string $placeholder = null;
    public ?string $value = null;
    public bool $disabled = false;
    public bool $required = false;
    public ?string $class = null;

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        string $type = 'text',
        ?string $placeholder = null,
        ?string $value = null,
        bool $disabled = false,
        bool $required = false,
        ?string $class = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->disabled = $disabled;
        $this->required = $required;
        $this->class = $class;
    }

    public function render()
    {
        return view('bladcn::components.input');
    }

    public function getInputClasses(): string
    {
        $classes = [
            'w-full px-3 py-2 border border-gray-300 rounded-md',
            'bg-white text-gray-900 placeholder-gray-500',
            'focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
            'transition-colors duration-200',
        ];

        if ($this->disabled) {
            $classes[] = 'bg-gray-100 text-gray-500 cursor-not-allowed opacity-50';
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }
}
