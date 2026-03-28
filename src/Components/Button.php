<?php

namespace AiluraCode\BladCN\Components;

use Illuminate\View\Component;
use AiluraCode\BlaseUI\Components\Button as BlaseButton;
use AiluraCode\BlaseUI\Enums\Button\Type;

/**
 * BladCN Styled Button Component
 *
 * Extends BlaseUI Button with predefined styling.
 * This component is NOT directly accessible from Laravel.
 * Only accessible through BladCN ecosystem via <x-bladcn:button>.
 *
 * @property string|null $variant - Button variant: primary, secondary, danger, ghost, outline
 * @property string|null $size - Button size: sm, md, lg, xl
 * @property bool $disabled - Whether button is disabled
 * @property bool $loading - Whether button is in loading state
 */
class Button extends Component
{
    public ?string $id = null;
    public ?string $class = null;
    public ?string $variant = 'primary';
    public ?string $size = 'md';
    public ?string $type = 'button';
    public bool $disabled = false;
    public bool $loading = false;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $id = null,
        ?string $class = null,
        ?string $variant = 'primary',
        ?string $size = 'md',
        ?string $type = 'button',
        bool $disabled = false,
        bool $loading = false
    ) {
        $this->id = $id;
        $this->class = $class;
        $this->variant = $variant;
        $this->size = $size;
        $this->type = $type;
        $this->disabled = $disabled;
        $this->loading = $loading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('bladcn::components.button');
    }

    /**
     * Get Tailwind classes based on variant and size
     */
    public function getVariantClasses(): string
    {
        $variants = [
            'primary' => 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm',
            'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-900',
            'danger' => 'bg-red-600 hover:bg-red-700 text-white',
            'ghost' => 'hover:bg-gray-100 text-gray-900',
            'outline' => 'border border-gray-300 hover:bg-gray-50 text-gray-900',
        ];

        return $variants[$this->variant] ?? $variants['primary'];
    }

    /**
     * Get Tailwind classes based on size
     */
    public function getSizeClasses(): string
    {
        $sizes = [
            'sm' => 'px-3 py-1.5 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-6 py-3 text-lg',
            'xl' => 'px-8 py-4 text-xl',
        ];

        return $sizes[$this->size] ?? $sizes['md'];
    }

    /**
     * Get complete button classes
     */
    public function getButtonClasses(): string
    {
        $classes = [
            'inline-flex items-center justify-center rounded-md font-medium transition-colors',
            'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2',
            $this->getVariantClasses(),
            $this->getSizeClasses(),
        ];

        if ($this->disabled || $this->loading) {
            $classes[] = 'opacity-50 cursor-not-allowed';
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }
}
