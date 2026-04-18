<?php

namespace AiluraCode\Bladcn\Exceptions;

class InvalidOptionException extends BladcnException
{
    private static function formatValue(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if ($value === null) {
            return 'null';
        }

        return (string) $value;
    }

    public function __construct(
        string $component,
        string $property,
        mixed $invalidValue = null,
        ?array $options = null
    ) {
        $message = "<x-{$component} />: {$property}";

        if ($invalidValue !== null) {
            $message .= " '" . self::formatValue($invalidValue) . "'";
        }

        $message .= " is invalid.";

        if (!empty($options)) {
            $formattedOptions = array_map(
                fn ($opt) => self::formatValue($opt),
                $options,
            );
            $message .= " Allowed values are: " . implode(', ', $formattedOptions) . ".";
        }

        parent::__construct($message);
    }
}