# Combobox Component

The combobox component provides a searchable dropdown select.

## Usage

```bladehtml

<x-bladcn::combobox>
    <x-bladcn::combobox.input placeholder="Select option" />
    <x-bladcn::combobox.content>
        <x-bladcn::combobox.item value="option1">Option 1</x-bladcn::combobox.item>
        <x-bladcn::combobox.item value="option2">Option 2</x-bladcn::combobox.item>
    </x-bladcn::combobox.content>
</x-bladcn::combobox>
```

## Components

| Component            | Description             |
| -------------------- | ----------------------- |
| `combobox`           | Main combobox container |
| `combobox.input`     | Search input field      |
| `combobox.content`   | Dropdown content panel  |
| `combobox.item`      | Selectable item         |
| `combobox.label`     | Label for item grouping |
| `combobox.group`     | Item group container    |
| `combobox.empty`     | Empty state message     |
| `combobox.separator` | Separator between items |

## Props

### Combobox Props

| Prop           | Type            | Default | Description               |
| -------------- | --------------- | ------- | ------------------------- |
| `id`           | `string\|null`  | `null`  | The element ID            |
| `class`        | `string\|null`  | `null`  | Additional CSS classes    |
| `style`        | `string\|null`  | `null`  | Inline styles             |
| `transition`   | `bool`          | `false` | Enable transitions        |
| `expanded`     | `bool`          | `false` | Start expanded (open)     |
| `multiple`     | `bool`          | `false` | Allow multiple selections |
| `defaultValue` | `string\|array` | `null`  | Default selected value(s) |

### Input Props

| Prop          | Type           | Default | Description           |
| ------------- | -------------- | ------- | --------------------- |
| `disabled`    | `bool`         | `false` | Disable the input     |
| `showTrigger` | `bool`         | `true`  | Show dropdown trigger |
| `showClear`   | `bool`         | `false` | Show clear button     |
| `placeholder` | `string\|null` | `null`  | Input placeholder     |

### Item Props

| Prop    | Type           | Default | Description            |
| ------- | -------------- | ------- | ---------------------- |
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |
| `value` | `string`       | -       | Item value             |

### Content Props

| Prop         | Type           | Default    | Description                                          |
| ------------ | -------------- | ---------- | ---------------------------------------------------- |
| `id`         | `string\|null` | `null`     | The element ID                                       |
| `class`      | `string\|null` | `null`     | Additional CSS classes                               |
| `style`      | `string\|null` | `null`     | Inline styles                                        |
| `side`       | `string`       | `'bottom'` | Popover placement (`top`, `bottom`, `left`, `right`) |
| `sideOffset` | `int`          | `6`        | Offset from anchor                                   |
| `align`      | `string`       | `'start'`  | Alignment (`start`, `center`, `end`)                 |

## Data Attributes

- `data-slot="combobox"` - Main combobox container
- `data-slot="combobox-input"` - Input element
- `data-slot="combobox-content"` - Content panel
- `data-slot="combobox-item"` - Selectable item
- `data-slot="combobox-label"` - Label item
- `data-slot="combobox-empty"` - Empty state

## Examples

### Basic Combobox

```bladehtml

<x-bladcn::combobox>
    <x-bladcn::combobox.input placeholder="Select a fruit" />
    <x-bladcn::combobox.content>
        <x-bladcn::combobox.item value="apple">Apple</x-bladcn::combobox.item>
        <x-bladcn::combobox.item value="banana">Banana</x-bladcn::combobox.item>
        <x-bladcn::combobox.item value="cherry">Cherry</x-bladcn::combobox.item>
    </x-bladcn::combobox.content>
</x-bladcn::combobox>
```

### Multiple Select Combobox

```bladehtml

<x-bladcn::combobox multiple>
    <x-bladcn::combobox.input placeholder="Select multiple" />
    <x-bladcn::combobox.content>
        <x-bladcn::combobox.item value="red">Red</x-bladcn::combobox.item>
        <x-bladcn::combobox.item value="green">Green</x-bladcn::combobox.item>
        <x-bladcn::combobox.item value="blue">Blue</x-bladcn::combobox.item>
    </x-bladcn::combobox.content>
</x-bladcn::combobox>
```

### Combobox with Groups

```bladehtml

<x-bladcn::combobox>
    <x-bladcn::combobox.input placeholder="Select" />
    <x-bladcn::combobox.content>
        <x-bladcn::combobox.label>Fruits</x-bladcn::combobox.label>
        <x-bladcn::combobox.item value="apple">Apple</x-bladcn::combobox.item>
        <x-bladcn::combobox.item value="banana">Banana</x-bladcn::combobox.item>
        <x-bladcn::combobox.separator />
        <x-bladcn::combobox.label>Vegetables</x-bladcn::combobox.label>
        <x-bladcn::combobox.item value="carrot">Carrot</x-bladcn::combobox.item>
    </x-bladcn::combobox.content>
</x-bladcn::combobox>
```
