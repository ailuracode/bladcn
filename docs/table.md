# Table Components

The table components provide a consistent, accessible table layout with support for headers, footers, captions, and row
selection states.

## Usage

```bladehtml

<x-bladcn::table>
    <x-bladcn::table.caption>
        Employees
    </x-bladcn::table.caption>
    <x-bladcn::table.header>
        <x-bladcn::table.row>
            <x-bladcn::table.head>Name</x-bladcn::table.head>
            <x-bladcn::table.head>Email</x-bladcn::table.head>
            <x-bladcn::table.head>Role</x-bladcn::table.head>
        </x-bladcn::table.row>
    </x-bladcn::table.header>
    <x-bladcn::table.body>
        <x-bladcn::table.row>
            <x-bladcn::table.cell>John Doe</x-bladcn::table.cell>
            <x-bladcn::table.cell>john@example.com</x-bladcn::table.cell>
            <x-bladcn::table.cell>Admin</x-bladcn::table.cell>
        </x-bladcn::table.row>
    </x-bladcn::table.body>
    <x-bladcn::table.footer>
        <x-bladcn::table.row>
            <x-bladcn::table.cell>Total</x-bladcn::table.cell>
            <x-bladcn::table.cell>1</x-bladcn::table.cell>
            <x-bladcn::table.cell></x-bladcn::table.cell>
        </x-bladcn::table.row>
    </x-bladcn::table.footer>
</x-bladcn::table>
```

## Components

| Component | HTML Tag            | Description               |
|-----------|---------------------|---------------------------|
| `table`   | `<div>` + `<table>` | Table wrapper with scroll |
| `caption` | `<caption>`         | Table title/description   |
| `header`  | `<thead>`           | Table header group        |
| `body`    | `<tbody>`           | Table body group          |
| `footer`  | `<tfoot>`           | Table footer group        |
| `row`     | `<tr>`              | Table row                 |
| `head`    | `<th>`              | Header cell               |
| `cell`    | `<td>`              | Data cell                 |

## Props

### Shared Props

All table components share these base props:

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Cell Props (`head`, `cell`)

| Prop      | Type          | Default | Description                      |
|-----------|---------------|---------|----------------------------------|
| `colspan` | `int\|string` | `null`  | Number of columns the cell spans |
| `rowspan` | `int\|string` | `null`  | Number of rows the cell spans    |

### Header Cell Props (`head` only)

| Prop      | Type                  | Default | Description                                 |
|-----------|-----------------------|---------|---------------------------------------------|
| `scope`   | `Scope\|string\|null` | `null`  | Accessibility scope enum or string value    |
| `headers` | `string\|null`        | `null`  | Space-separated IDs of related header cells |
| `abbr`    | `string\|null`        | `null`  | Abbreviated text for screen readers         |

### Scope Enum

The `Scope` enum (`AiluraCode\Bladcn\Enums\Table\Scope`) provides type-safe values for the `scope` attribute on header
cells:

| Case              | Value      | Description                      |
|-------------------|------------|----------------------------------|
| `Scope::Col`      | `col`      | Header applies to a column       |
| `Scope::Row`      | `row`      | Header applies to a row          |
| `Scope::ColGroup` | `colgroup` | Header applies to a column group |
| `Scope::RowGroup` | `rowgroup` | Header applies to a row group    |

The `scope` prop accepts either the enum instance or a string value, with automatic coercion via `Scope::tryFrom()`.

### Data Cell Props (`cell` only)

| Prop      | Type           | Default | Description                                 |
|-----------|----------------|---------|---------------------------------------------|
| `headers` | `string\|null` | `null`  | Space-separated IDs of related header cells |

## Data Attributes

Each component exposes a `data-slot` attribute for testing and styling:

- `data-slot="table-container"` - Outer scrollable wrapper
- `data-slot="table"` - The `<table>` element
- `data-slot="table-caption"` - Table caption
- `data-slot="table-header"` - Header group
- `data-slot="table-body"` - Body group
- `data-slot="table-footer"` - Footer group
- `data-slot="table-row"` - Table row
- `data-slot="table-head"` - Header cell
- `data-slot="table-cell"` - Data cell

## Examples

### With Colspan and Rowspan

```bladehtml

<x-bladcn::table>
    <x-bladcn::table.header>
        <x-bladcn::table.row>
            <x-bladcn::table.head scope="col" rowspan="2">Name</x-bladcn::table.head>
            <x-bladcn::table.head scope="colgroup" colspan="2">Contact</x-bladcn::table.head>
        </x-bladcn::table.row>
        <x-bladcn::table.row>
            <x-bladcn::table.head scope="col">Email</x-bladcn::table.head>
            <x-bladcn::table.head scope="col">Phone</x-bladcn::table.head>
        </x-bladcn::table.row>
    </x-bladcn::table.header>
    <x-bladcn::table.body>
        <x-bladcn::table.row>
            <x-bladcn::table.cell>John Doe</x-bladcn::table.cell>
            <x-bladcn::table.cell>john@example.com</x-bladcn::table.cell>
            <x-bladcn::table.cell>+1 234 567 890</x-bladcn::table.cell>
        </x-bladcn::table.row>
    </x-bladcn::table.body>
</x-bladcn::table>
```

### With Row Selection

```bladehtml

<x-bladcn::table>
    <x-bladcn::table.header>
        <x-bladcn::table.row>
            <x-bladcn::table.head>Select</x-bladcn::table.head>
            <x-bladcn::table.head>Name</x-bladcn::table.head>
        </x-bladcn::table.row>
    </x-bladcn::table.header>
    <x-bladcn::table.body>
        <x-bladcn::table.row data-state="selected">
            <x-bladcn::table.cell>
                <input type="checkbox" checked/>
            </x-bladcn::table.cell>
            <x-bladcn::table.cell>Selected Row</x-bladcn::table.cell>
        </x-bladcn::table.row>
        <x-bladcn::table.row>
            <x-bladcn::table.cell>
                <input type="checkbox"/>
            </x-bladcn::table.cell>
            <x-bladcn::table.cell>Normal Row</x-bladcn::table.cell>
        </x-bladcn::table.row>
    </x-bladcn::table.body>
</x-bladcn::table>
```

### With Checkbox Column and Badge

```bladehtml

<x-bladcn::table>
    <x-bladcn::table.header>
        <x-bladcn::table.row>
            <x-bladcn::table.head>Select</x-bladcn::table.head>
            <x-bladcn::table.head>Name</x-bladcn::table.head>
        </x-bladcn::table.row>
    </x-bladcn::table.header>
    <x-bladcn::table.body>
        <x-bladcn::table.row data-state="selected">
            <x-bladcn::table.cell>
                <input type="checkbox" checked/>
            </x-bladcn::table.cell>
            <x-bladcn::table.cell>Selected Row</x-bladcn::table.cell>
        </x-bladcn::table.row>
        <x-bladcn::table.row>
            <x-bladcn::table.cell>
                <input type="checkbox"/>
            </x-bladcn::table.cell>
            <x-bladcn::table.cell>Normal Row</x-bladcn::table.cell>
        </x-bladcn::table.row>
    </x-bladcn::table.body>
</x-bladcn::table>
```

### Accessible Table with Scope

```bladehtml
{{-- Using string values --}}
<x-bladcn::table>
    <x-bladcn::table.caption>
        Monthly Sales Report
    </x-bladcn::table.caption>
    <x-bladcn::table.header>
        <x-bladcn::table.row>
            <x-bladcn::table.head scope="col">Month</x-bladcn::table.head>
            <x-bladcn::table.head scope="col">Revenue</x-bladcn::table.head>
            <x-bladcn::table.head scope="col">Expenses</x-bladcn::table.head>
        </x-bladcn::table.row>
    </x-bladcn::table.header>
    <x-bladcn::table.body>
        <x-bladcn::table.row>
            <x-bladcn::table.cell>January</x-bladcn::table.cell>
            <x-bladcn::table.cell>$10,000</x-bladcn::table.cell>
            <x-bladcn::table.cell>$7,500</x-bladcn::table.cell>
        </x-bladcn::table.row>
    </x-bladcn::table.body>
</x-bladcn::table>

{{-- Using Scope enum --}}
<x-bladcn::table>
    <x-bladcn::table.header>
        <x-bladcn::table.row>
            <x-bladcn::table.head :scope="\AiluraCode\Bladcn\Enums\Table\Scope::Col">Name</x-bladcn::table.head>
            <x-bladcn::table.head :scope="\AiluraCode\Bladcn\Enums\Table\Scope::Col">Email</x-bladcn::table.head>
        </x-bladcn::table.row>
    </x-bladcn::table.header>
</x-bladcn::table>
```
