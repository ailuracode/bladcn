# Table Component

## Props

- `...attributes` (mergeable)

## Slots

- Filas, celdas, encabezado, pie, cuerpo, caption

## Ejemplo de uso

```blade
<x-table>
    <x-table.header>
        <x-table.row>
            <x-table.head>Columna 1</x-table.head>
            <x-table.head>Columna 2</x-table.head>
        </x-table.row>
    </x-table.header>
    <x-table.body>
        <x-table.row>
            <x-table.cell>Dato 1</x-table.cell>
            <x-table.cell>Dato 2</x-table.cell>
        </x-table.row>
    </x-table.body>
    <x-table.footer>
        <x-table.row>
            <x-table.cell>Pie 1</x-table.cell>
            <x-table.cell>Pie 2</x-table.cell>
        </x-table.row>
    </x-table.footer>
    <x-table.caption>Descripción de la tabla</x-table.caption>
</x-table>
```

## Subcomponentes

### `<x-table.header>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Filas de encabezado
  **Ejemplo:**

```blade
<x-table.header>
    <x-table.row>
        <x-table.head>Columna</x-table.head>
    </x-table.row>
</x-table.header>
```

### `<x-table.row>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Celdas
  **Ejemplo:**

```blade
<x-table.row>
    <x-table.cell>Dato</x-table.cell>
</x-table.row>
```

### `<x-table.head>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto de encabezado
  **Ejemplo:**

```blade
<x-table.head>Columna</x-table.head>
```

### `<x-table.body>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Filas de datos
  **Ejemplo:**

```blade
<x-table.body>
    <x-table.row>
        <x-table.cell>Dato</x-table.cell>
    </x-table.row>
</x-table.body>
```

### `<x-table.cell>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Dato
  **Ejemplo:**

```blade
<x-table.cell>Dato</x-table.cell>
```

### `<x-table.footer>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Filas de pie
  **Ejemplo:**

```blade
<x-table.footer>
    <x-table.row>
        <x-table.cell>Pie</x-table.cell>
    </x-table.row>
</x-table.footer>
```

### `<x-table.caption>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto descriptivo
  **Ejemplo:**

```blade
<x-table.caption>Descripción de la tabla</x-table.caption>
```

## Detalles

Contenedor para tablas estilizadas, soporta slots para filas, celdas, encabezado, pie, cuerpo y caption.
