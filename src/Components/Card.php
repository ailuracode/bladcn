<?php

namespace AiluraCode\BladCN\Components;

use Illuminate\View\Component;

/**
 * BladCN Styled Card Component
 *
 * Container component with predefined styling for cards/panels.
 * Only accessible through BladCN ecosystem via <x-bladcn:card>.
 *
 * Note: BlaseUI doesn't have Card component yet, so BladCN provides it.
 * Once BlaseUI has Card, this should extend from it.
 *
 * @property string|null $title - Card title
 * @property string|null $subtitle - Card subtitle/description
 * @property bool $bordered - Whether to show border
 * @property string $shadow - Shadow intensity: none, sm, md, lg
 */
class Card extends Component
{
    public ?string $title = null;
    public ?string $subtitle = null;
    public bool $bordered = true;
    public string $shadow = 'md';
    public ?string $class = null;

    public function __construct(
        ?string $title = null,
        ?string $subtitle = null,
        bool $bordered = true,
        string $shadow = 'md',
        ?string $class = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->bordered = $bordered;
        $this->shadow = $shadow;
        $this->class = $class;
    }

    public function render()
    {
        return view('bladcn::components.card');
    }

    public function getCardClasses(): string
    {
        $classes = [
            'rounded-lg bg-white',
        ];

        if ($this->bordered) {
            $classes[] = 'border border-gray-200';
        }

        $shadows = [
            'none' => '',
            'sm' => 'shadow-sm',
            'md' => 'shadow-md',
            'lg' => 'shadow-lg',
        ];

        if (isset($shadows[$this->shadow])) {
            $classes[] = $shadows[$this->shadow];
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', array_filter($classes));
    }
}
