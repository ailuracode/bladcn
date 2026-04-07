# Pagination Component

The pagination component provides navigation for paginated content.

## Usage

```bladehtml

<x-bladcn::pagination>
    <x-bladcn::pagination.previous />
    <x-bladcn::pagination.content>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>1</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link is-active="true">2</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
        <x-bladcn::pagination.ellipsis />
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>10</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
    </x-bladcn::pagination.content>
    <x-bladcn::pagination.next />
</x-bladcn::pagination>
```

## Components

| Component             | Description               |
|-----------------------|---------------------------|
| `pagination`          | Main pagination container |
| `pagination.content`  | Pagination list wrapper   |
| `pagination.item`     | List item wrapper         |
| `pagination.link`     | Page link button          |
| `pagination.ellipsis` | Ellipsis placeholder      |
| `pagination.previous` | Previous page button      |
| `pagination.next`     | Next page button          |

## Props

### Pagination Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Content Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Item Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Link Props

| Prop       | Type           | Default         | Description            |
|------------|----------------|-----------------|------------------------|
| `id`       | `string\|null` | `null`          | The element ID         |
| `class`    | `string\|null` | `null`          | Additional CSS classes |
| `style`    | `string\|null` | `null`          | Inline styles          |
| `size`     | `Size\|string` | `Size::Default` | Button size            |
| `isActive` | `bool`         | `false`         | Active state           |

### Ellipsis Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Previous Props

| Prop    | Type           | Default      | Description            |
|---------|----------------|--------------|------------------------|
| `id`    | `string\|null` | `null`       | The element ID         |
| `class` | `string\|null` | `null`       | Additional CSS classes |
| `style` | `string\|null` | `null`       | Inline styles          |
| `text`  | `string`       | `'Previous'` | Previous button text   |

### Next Props

| Prop    | Type           | Default  | Description            |
|---------|----------------|----------|------------------------|
| `id`    | `string\|null` | `null`   | The element ID         |
| `class` | `string\|null` | `null`   | Additional CSS classes |
| `style` | `string\|null` | `null`   | Inline styles          |
| `text`  | `string`       | `'Next'` | Next button text       |

## Data Attributes

- `data-slot="pagination"` - Main container
- `data-slot="pagination-content"` - Content wrapper
- `data-slot="pagination-item"` - List item
- `data-slot="pagination-link"` - Page link
- `data-slot="pagination-ellipsis"` - Ellipsis
- `data-active` - Active state on links

## Examples

### Basic Pagination

```bladehtml

<x-bladcn::pagination>
    <x-bladcn::pagination.previous />
    <x-bladcn::pagination.content>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>1</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>2</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>3</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
    </x-bladcn::pagination.content>
    <x-bladcn::pagination.next />
</x-bladcn::pagination>
```

### Pagination with Ellipsis

```bladehtml

<x-bladcn::pagination>
    <x-bladcn::pagination.previous />
    <x-bladcn::pagination.content>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>1</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>2</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
        <x-bladcn::pagination.ellipsis />
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>10</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
    </x-bladcn::pagination.content>
    <x-bladcn::pagination.next />
</x-bladcn::pagination>
```

### Pagination with Custom Text

```bladehtml

<x-bladcn::pagination>
    <x-bladcn::pagination.previous text="Voltar" />
    <x-bladcn::pagination.content>
        <x-bladcn::pagination.item>
            <x-bladcn::pagination.link>1</x-bladcn::pagination.link>
        </x-bladcn::pagination.item>
    </x-bladcn::pagination.content>
    <x-bladcn::pagination.next text="Avançar" />
</x-bladcn::pagination>
```
