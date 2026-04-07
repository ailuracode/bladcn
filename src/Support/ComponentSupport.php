<?php

namespace AiluraCode\Bladcn\Support;

use AiluraCode\Bladcn\Enums\Basic\AsChild;

class ComponentSupport
{
    public static function coerceAsChild(mixed $asChild): AsChild
    {
        return AsChild::coerceFrom($asChild);
    }

    public static function isLink(AsChild $isAsChild, mixed $slot, array $attrs): bool
    {
        if (! $isAsChild->isTrue()) {
            return false;
        }

        $parsed = AsChildParser::parse((string) $slot, $attrs);

        return in_array($parsed['tag'] ?? '', ['a', 'area'], true);
    }

    public static function buildAttrs(
        ?string $id,
        ?string $style,
        string $slot,
        string $variant,
        ?string $role = null,
        array $extra = [],
    ): array {
        $attrs = array_merge([
            'id' => $id,
            'style' => $style,
            'data-slot' => $slot,
            'data-variant' => $variant,
        ], $extra);

        if ($role !== null) {
            $attrs['role'] = $role;
        }

        return $attrs;
    }
}
