<?php

namespace AiluraCode\Bladcn\Exceptions;

class EmptySlotException extends BladcnException
{
    public function __construct(string $component, ?string $slot = null)
    {
        $componentName = ucfirst($component);

        if ($slot) {
            $message = "{$componentName}: Slot '{$slot}' cannot be empty.";
        } else {
            $message = "{$componentName}: A required slot cannot be empty.";
        }

        parent::__construct($message);
    }
}
