@props([
    'src' => null,
    'alt' => null,
])

<img @@load="setShowImage(true)" alt="{{ $alt }}" class="size-full rounded-full object-cover"
    data-slot="avatar-image" src="{{ $src }}" x-cloak x-show="showImage" />
