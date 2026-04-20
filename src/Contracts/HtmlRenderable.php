<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn\Contracts;

interface HtmlRenderable
{
    public function toHtml(): ?string;
}
