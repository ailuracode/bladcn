<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Contracts;

interface Classable
{
    public function toClass(): ?string;
}
