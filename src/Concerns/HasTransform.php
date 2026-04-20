<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Concerns;

use Override;

trait HasTransform
{
    #[Override]
    public static function toArray(): array
    {
        return self::cases();
    }
}
