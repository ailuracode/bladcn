<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Support;

use AiluraCode\Bladcn\Exceptions\InvalidOptionException;

final class OptionValidator
{
    public static function handle(string $componentName, string $property, mixed $value, array $options): void
    {
        if (in_array($value, $options, true)) {
            return;
        }

        throw new InvalidOptionException($componentName, $property, $value, $options);
    }
}
