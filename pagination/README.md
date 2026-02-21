# Pagination Component

## Props

- `...attributes` (mergeable)

## Slots

- Elementos de paginación, links, items, contenido, ellipsis, anterior, siguiente

## Ejemplo de uso

```blade
<x-pagination>
    <x-pagination.previous text="Anterior" />
    <x-pagination.content>
        <x-pagination.item>
            <x-pagination.link isActive>1</x-pagination.link>
        </x-pagination.item>
        <x-pagination.ellipsis />
        <x-pagination.item>
            <x-pagination.link>2</x-pagination.link>
        </x-pagination.item>
    </x-pagination.content>
    <x-pagination.next text="Siguiente" />
</x-pagination>
```

## Subcomponentes

### `<x-pagination.content>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Items de paginación
  **Ejemplo:**

```blade
<x-pagination.content>
    <x-pagination.item>
        <x-pagination.link>1</x-pagination.link>
    </x-pagination.item>
</x-pagination.content>
```

### `<x-pagination.item>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Link o contenido
  **Ejemplo:**

```blade
<x-pagination.item>
    <x-pagination.link>1</x-pagination.link>
</x-pagination.item>
```

### `<x-pagination.link>`

**Props:**

- `isActive`: Si el link está activo (default: false)
- `size`: Tamaño (default: 'icon')
- `...attributes` (mergeable)
  **Slots:**
- Texto o número
  **Ejemplo:**

```blade
<x-pagination.link isActive>1</x-pagination.link>
```

### `<x-pagination.ellipsis>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Ninguno
  **Ejemplo:**

```blade
<x-pagination.ellipsis />
```

### `<x-pagination.previous>`

**Props:**

- `text`: Texto (default: 'Previous')
- `...attributes` (mergeable)
  **Slots:**
- Ninguno
  **Ejemplo:**

```blade
<x-pagination.previous text="Anterior" />
```

### `<x-pagination.next>`

**Props:**

- `text`: Texto (default: 'Next')
- `...attributes` (mergeable)
  **Slots:**
- Ninguno
  **Ejemplo:**

```blade
<x-pagination.next text="Siguiente" />
```

## Detalles

Contenedor para controles de paginación, soporta slots para items, links, contenido, ellipsis, anterior y siguiente.
