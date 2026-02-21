# Card Component

## Props

- `size`: Tamaño (default: 'default')
- `...attributes` (mergeable)

## Slots

- Contenido, imágenes, header, footer, título, descripción, acción

## Ejemplo de uso

```blade
<x-card size="sm">
    <x-card.header>
        <x-card.title>Título</x-card.title>
        <x-card.action>
            <x-button>Acción</x-button>
        </x-card.action>
    </x-card.header>
    <x-card.content>
        <img src="..." />
        <x-card.description>Descripción</x-card.description>
    </x-card.content>
    <x-card.footer>
        Pie de página
    </x-card.footer>
</x-card>
```

## Subcomponentes

### `<x-card.header>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Título, acción
  **Ejemplo:**

```blade
<x-card.header>
    <x-card.title>Título</x-card.title>
    <x-card.action>
        <x-button>Acción</x-button>
    </x-card.action>
</x-card.header>
```

### `<x-card.title>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto del título
  **Ejemplo:**

```blade
<x-card.title>Título</x-card.title>
```

### `<x-card.action>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Botón u otro elemento de acción
  **Ejemplo:**

```blade
<x-card.action>
    <x-button>Acción</x-button>
</x-card.action>
```

### `<x-card.content>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Contenido, imágenes, descripción
  **Ejemplo:**

```blade
<x-card.content>
    <img src="..." />
    <x-card.description>Descripción</x-card.description>
</x-card.content>
```

### `<x-card.description>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto descriptivo
  **Ejemplo:**

```blade
<x-card.description>Descripción</x-card.description>
```

### `<x-card.footer>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Contenido del pie de página
  **Ejemplo:**

```blade
<x-card.footer>Pie de página</x-card.footer>
```

## Detalles

Contenedor visual para tarjetas, soporta slots para header, footer, título, descripción, acción y contenido.
