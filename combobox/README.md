# Combobox Component

## Props

- `transition`: Animación (default: false)
- `expanded`: Estado inicial (default: false)
- `multiple`: Selección múltiple (default: false)
- `defaultValue`: Valor inicial
- `...attributes` (mergeable)

## Slots

- Items, input, chips, chip, content, list, group, label, separator, trigger, value, collection, empty, clear

## Ejemplo de uso

```blade
<x-combobox multiple defaultValue="['a','b']">
    <x-combobox.input showTrigger showClear placeholder="Buscar..." />
    <x-combobox.chips>
        <x-combobox.chip value="a" />
        <x-combobox.chip value="b" />
    </x-combobox.chips>
    <x-combobox.content>
        <x-combobox.list>
            <x-combobox.item value="a">A</x-combobox.item>
            <x-combobox.item value="b">B</x-combobox.item>
        </x-combobox.list>
        <x-combobox.empty>No hay resultados</x-combobox.empty>
    </x-combobox.content>
</x-combobox>
```

## Subcomponentes

### `<x-combobox.input>`

**Props:**

- `disabled`: Deshabilitado (default: false)
- `showTrigger`: Mostrar trigger (default: true)
- `showClear`: Mostrar botón limpiar (default: false)
- `placeholder`: Texto placeholder
- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.input showTrigger showClear placeholder="Buscar..." />
```

### `<x-combobox.chips>`

**Props:**

- `disabled`: Deshabilitado (default: false)
- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.chips>
    <x-combobox.chip value="a" />
</x-combobox.chips>
```

### `<x-combobox.chip>`

**Props:**

- `showRemove`: Mostrar botón eliminar (default: true)
- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.chip value="a" showRemove />
```

### `<x-combobox.content>`

**Props:**

- `side`: Posición (default: 'bottom')
- `sideOffset`: Offset de posición (default: 6)
- `align`: Alineación (default: 'start')
- `alignOffset`: Offset de alineación (default: 0)
- `anchor`: Elemento anchor
- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.content side="bottom">
    <x-combobox.list>
        <x-combobox.item value="a">A</x-combobox.item>
    </x-combobox.list>
</x-combobox.content>
```

### `<x-combobox.list>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.list>
    <x-combobox.item value="a">A</x-combobox.item>
</x-combobox.list>
```

### `<x-combobox.item>`

**Props:**

- `value`: Valor del item
- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.item value="a">A</x-combobox.item>
```

### `<x-combobox.empty>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.empty>No hay resultados</x-combobox.empty>
```

### `<x-combobox.group>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.group>
    <x-combobox.item value="a">A</x-combobox.item>
</x-combobox.group>
```

### `<x-combobox.label>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.label>Grupo</x-combobox.label>
```

### `<x-combobox.separator>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.separator />
```

### `<x-combobox.trigger>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.trigger />
```

### `<x-combobox.value>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.value>A</x-combobox.value>
```

### `<x-combobox.collection>`

**Props:**

- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.collection>
    <x-combobox.item value="a">A</x-combobox.item>
</x-combobox.collection>
```

### `<x-combobox.clear>`

**Props:**

- `size`: Tamaño
- `variant`: Estilo visual
- `...attributes` (mergeable)

**Ejemplo:**

```blade
<x-combobox.clear size="sm" variant="ghost" />
```

## Detalles

Selector avanzado, soporta selección múltiple, chips, grupos, lista, trigger, value, separator, clear, y personalización
de contenido.
