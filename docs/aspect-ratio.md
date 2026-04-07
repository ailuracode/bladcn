# Aspect Ratio

A container that forces a specific aspect ratio on its content.

```bladehtml

<x-bladcn::aspect-ratio ratio="16/9">
    <img src="/image.jpg" alt="Example"/>
</x-bladcn::aspect-ratio>
```

## Props

| Prop    | Type   | Default  | Description            |
|---------|--------|----------|------------------------|
| `ratio` | string | `square` | Aspect ratio value     |
| `id`    | string | `null`   | HTML id attribute      |
| `class` | string | `null`   | Additional CSS classes |
| `style` | string | `null`   | Inline styles          |

## Ratios

Uses Tailwind CSS `aspect-*` utilities. Common values:

| Value      | Ratio |
|------------|-------|
| `square`   | 1:1   |
| `video`    | 16:9  |
| `portrait` | 3:4   |
| `16/9`     | 16:9  |
| `4/3`      | 4:3   |
| `21/9`     | 21:9  |
