<?php

namespace AiluraCode\Bladcn\Exceptions;

class InvalidOptionException extends BladcnException
{
    public function __construct(
        string $component,
        string $property,
        ?string $invalidValue = null,
        ?array $options = null
    ) {
        $componentName = ucfirst($component);
        $propertyName = ucfirst($property);

        $message = "{$componentName}: {$propertyName}";

        if ($invalidValue !== null) {
            $message .= " '{$invalidValue}'";
        }

        $message .= " is invalid.";

        if (!empty($options)) {
            $message .= " Allowed values are: " . implode(', ', $options) . ".";
        }

        parent::__construct($message);
    }
}
