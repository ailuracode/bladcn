<?php

declare(strict_types=1);

use AiluraCode\Bladcn\Support\OptionValidator;
use Illuminate\View\ComponentAttributeBag;

function bladcnOptionValidator(string $componentName, string $property, mixed $value, array $options): void
{
    OptionValidator::handle($componentName, $property, $value, $options);
}

function bladcnOptionsValidator(string $componentName, array $validations): void
{
    foreach ($validations as $property => $options) {
        $value = $options['value'] ?? null;
        $opts = $options['options'] ?? $options;
        OptionValidator::handle($componentName, $property, $value, $opts);
    }
}

function bladcnSplit(string|array|null $value): array
{
    return match (true) {
        $value === '' || $value === null => [],
        is_array($value) => $value,
        default => array_map(trim(...), explode(',', $value)),
    };
}

function bladcnHasEvent(ComponentAttributeBag $attributes, string $event): bool
{
    if ($attributes->has('x-on:'.$event)) {
        return true;
    }
    if ($attributes->has('@'.$event)) {
        return true;
    }

    return $attributes->has('wire:'.$event);
}

function bladcnHasEvents(ComponentAttributeBag $attributes, array $events): array
{
    $results = [];
    foreach ($events as $event) {
        $results[$event] = bladcnHasEvent($attributes, $event);
    }

    return $results;
}
