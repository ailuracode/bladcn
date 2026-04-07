# Avatar

A visual representation of a user with image fallback support.

```bladehtml
<x-bladcn::avatar>
  <x-bladcn::avatar.image src="/avatar.jpg" alt="John Doe" />
  <x-bladcn::avatar.fallback>JD</x-bladcn::avatar.fallback>
</x-bladcn::avatar>
```

## Props

| Prop    | Type   | Default   | Description                         |
|---------|--------|-----------|-------------------------------------|
| `size`  | string | `default` | Avatar size (`sm`, `default`, `lg`) |
| `id`    | string | `null`    | HTML id attribute                   |
| `class` | string | `null`    | Additional CSS classes              |
| `style` | string | `null`    | Inline styles                       |

## Subcomponents

### Avatar Image

Displays the user avatar image. Hidden if the image fails to load.

```bladehtml
<x-bladcn::avatar.image src="/avatar.jpg" alt="John Doe" />
```

| Prop    | Type   | Default | Description        |
|---------|--------|---------|--------------------|
| `src`   | string | `null`  | Image URL          |
| `alt`   | string | `null`  | Alternative text   |
| `id`    | string | `null`  | HTML id attribute  |
| `class` | string | `null`  | Additional classes |
| `style` | string | `null`  | Inline styles      |

### Avatar Fallback

Shown when the image fails to load. Typically, displays user initials.

```bladehtml
<x-bladcn::avatar.fallback>JD</x-bladcn::avatar.fallback>
```

### Avatar Badge

A small indicator positioned at the bottom-right of the avatar.

```bladehtml
<x-bladcn::avatar.badge>
  <svg><!-- check icon --></svg>
</x-bladcn::avatar.badge>
```

## Avatar Group

Display multiple avatars in an overlapping stack.

```bladehtml
<x-bladcn::avatar.group>
  <x-bladcn::avatar>
    <x-bladcn::avatar.fallback>A</x-bladcn::avatar.fallback>
  </x-bladcn::avatar>
  <x-bladcn::avatar>
    <x-bladcn::avatar.fallback>B</x-bladcn::avatar.fallback>
  </x-bladcn::avatar>
  <x-bladcn::avatar.group-count>+3</x-bladcn::avatar.group-count>
</x-bladcn::avatar.group>
```

### Avatar Group Props

| Prop    | Type   | Default | Description            |
|---------|--------|---------|------------------------|
| `id`    | string | `null`  | HTML id attribute      |
| `class` | string | `null`  | Additional CSS classes |
| `style` | string | `null`  | Inline styles          |

### Avatar Group Count

Displays a count of additional avatars not shown.

```bladehtml
<x-bladcn::avatar.group-count>+3</x-bladcn::avatar.group-count>
```
