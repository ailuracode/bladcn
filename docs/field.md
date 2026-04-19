# Field Component

The field component provides a wrapper for form inputs with label and error handling.

## Usage

```bladehtml

<x-bladcn::field>
    <x-bladcn::field.label>Email</x-bladcn::field.label>
    <x-bladcn::input type="email" />
    <x-bladcn::field.description>Enter your email address</x-bladcn::field.description>
</x-bladcn::field>
```

## Components

| Component           | Description              |
| ------------------- | ------------------------ |
| `field`             | Main field wrapper       |
| `field.label`       | Field label              |
| `field.description` | Help text description    |
| `field.error`       | Error message display    |
| `field.group`       | Group multiple fields    |
| `field.content`     | Input content wrapper    |
| `field.legend`      | Legend for fieldset      |
| `field.separator`   | Separator between fields |
| `field.set`         | Fieldset wrapper         |
| `field.title`       | Title text               |

## Props

### Field Props

| Prop          | Type           | Default      | Description            |
| ------------- | -------------- | ------------ | ---------------------- |
| `id`          | `string\|null` | `null`       | The element ID         |
| `class`       | `string\|null` | `null`       | Additional CSS classes |
| `style`       | `string\|null` | `null`       | Inline styles          |
| `orientation` | `string`       | `'vertical'` | Layout orientation     |
| `disabled`    | `bool`         | `false`      | Disable the field      |

### Label Props

| Prop       | Type   | Default | Description       |
| ---------- | ------ | ------- | ----------------- |
| `disabled` | `bool` | `false` | Disable the label |
| `asChild`  | `bool` | `false` | Render onto child |

### Error Props

| Prop     | Type           | Default | Description            |
| -------- | -------------- | ------- | ---------------------- |
| `id`     | `string\|null` | `null`  | The element ID         |
| `class`  | `string\|null` | `null`  | Additional CSS classes |
| `style`  | `string\|null` | `null`  | Inline styles          |
| `errors` | `array`        | `[]`    | Validation errors      |

## Orientation Options

| Value          | Description               |
| -------------- | ------------------------- |
| `'vertical'`   | Vertical layout (default) |
| `'horizontal'` | Horizontal layout         |
| `'responsive'` | Responsive layout         |

## Data Attributes

- `data-slot="field"` - Main field container
- `data-slot="field-label"` - Label element
- `data-slot="field-description"` - Description text
- `data-slot="field-error"` - Error message
- `data-slot="field-content"` - Content wrapper
- `data-orientation` - Current orientation

## Examples

### Basic Field

```bladehtml

<x-bladcn::field>
    <x-bladcn::field.label>Username</x-bladcn::field.label>
    <x-bladcn::input placeholder="Enter username" />
</x-bladcn::field>
```

### Field with Description

```bladehtml

<x-bladcn::field>
    <x-bladcn::field.label>Email</x-bladcn::field.label>
    <x-bladcn::input type="email" />
    <x-bladcn::field.description>We'll never share your email.</x-bladcn::field.description>
</x-bladcn::field>
```

### Field with Error

```bladehtml

<x-bladcn::field>
    <x-bladcn::field.label>Password</x-bladcn::field.label>
    <x-bladcn::input type="password" />
    <x-bladcn::field.error :errors="$errors['password']" />
</x-bladcn::field>
```

### Horizontal Field

```bladehtml

<x-bladcn::field orientation="horizontal">
    <x-bladcn::field.label>Name</x-bladcn::field.label>
    <x-bladcn::input />
</x-bladcn::field>
```

### Field Group

```bladehtml

<x-bladcn::field.group>
    <x-bladcn::field>
        <x-bladcn::field.label>First Name</x-bladcn::field.label>
        <x-bladcn::input />
    </x-bladcn::field>
    <x-bladcn::field>
        <x-bladcn::field.label>Last Name</x-bladcn::field.label>
        <x-bladcn::input />
    </x-bladcn::field>
</x-bladcn::field.group>
```
