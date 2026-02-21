# Button Group Component

## Example

```blade
<x-button-group orientation="vertical">
    <x-button>One</x-button>
    <x-button-group.separator />
    <x-button>Two</x-button>
    <x-button-group.text>Text</x-button-group.text>
</x-button-group>
```

## Props

- `orientation`: 'horizontal' or 'vertical' (default: 'horizontal')
- `...attributes` (mergeable)

## Slots

- Buttons, separator, text

## Subcomponents

### `<x-button-group.separator>`

**Props:**

- `orientation`: 'horizontal' or 'vertical' (default: 'horizontal')
- `...attributes` (mergeable)
  **Slots:** None
  **Example:**

```blade
<x-button-group.separator orientation="vertical" />
```

### `<x-button-group.text>`

**Props:**

- `as`: HTML tag (default: 'div')
- `...attributes` (mergeable)
  **Slots:** Text or content
  **Example:**

```blade
<x-button-group.text as="span">Text</x-button-group.text>
```

## Details

Groups buttons, configurable by orientation. Subcomponents allow adding separators and custom text.
