<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Exceptions;

final class InvalidOptionException extends BladcnException
{
    public function __construct(
        string $component,
        string $property,
        mixed $invalidValue = null,
        ?array $options = null
    ) {
        $message = sprintf('<x-%s />: %s', $component, $property);

        if ($invalidValue !== null) {
            $message .= " '".$this->formatValue($invalidValue)."'";
        }

        $message .= ' is invalid.';

        if ($options !== null && $options !== []) {
            $formattedOptions = array_map(
                $this->formatValue(...),
                $options,
            );
            $message .= ' Allowed values are: '.implode(', ', $formattedOptions).'.';
        }

        parent::__construct($message);
    }

    private function formatValue(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if ($value === null) {
            return 'null';
        }

        return (string) $value;
    }
}
