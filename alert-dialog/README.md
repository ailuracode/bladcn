# Alert Dialog Component

## Props

- `open`: Estado inicial (default: false)
- `...attributes` (mergeable)

## Slots

- Contenido, acciones, título, descripción

## Ejemplo de uso

```blade
<x-alert-dialog open>
    <x-alert-dialog.title>Confirmar</x-alert-dialog.title>
    <x-alert-dialog.content size="default">
        <x-alert-dialog.description>¿Seguro?</x-alert-dialog.description>
    </x-alert-dialog.content>
    <x-alert-dialog.action>OK</x-alert-dialog.action>
    <x-alert-dialog.cancel>Cancelar</x-alert-dialog.cancel>
</x-alert-dialog>
```

## Subcomponentes

### `<x-alert-dialog.title>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto del título
  **Ejemplo:**

```blade
<x-alert-dialog.title>Confirmar</x-alert-dialog.title>
```

### `<x-alert-dialog.content>`

**Props:**

- `size`: Tamaño (default: 'default')
- `...attributes` (mergeable)
  **Slots:**
- Contenido del diálogo
  **Ejemplo:**

```blade
<x-alert-dialog.content size="default">
    <x-alert-dialog.description>¿Seguro?</x-alert-dialog.description>
</x-alert-dialog.content>
```

### `<x-alert-dialog.description>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto descriptivo
  **Ejemplo:**

```blade
<x-alert-dialog.description>¿Seguro?</x-alert-dialog.description>
```

### `<x-alert-dialog.action>`

**Props:**

- `variant`: Estilo visual (default: 'default')
- `size`: Tamaño (default: 'default')
- `...attributes` (mergeable)
  **Slots:**
- Botón u otro elemento de acción
  **Ejemplo:**

```blade
<x-alert-dialog.action variant="default" size="default">OK</x-alert-dialog.action>
```

### `<x-alert-dialog.cancel>`

**Props:**

- `variant`: Estilo visual (default: 'outline')
- `size`: Tamaño (default: 'default')
- `...attributes` (mergeable)
  **Slots:**
- Botón u otro elemento de cancelación
  **Ejemplo:**

```blade
<x-alert-dialog.cancel variant="outline" size="default">Cancelar</x-alert-dialog.cancel>
```

### `<x-alert-dialog.trigger>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Elemento disparador
  **Ejemplo:**

```blade
<x-alert-dialog.trigger>
    <x-button>Abrir diálogo</x-button>
</x-alert-dialog.trigger>
```

## Detalles

Diálogo modal de alerta, gestionado por Alpine.js. Subcomponentes permiten personalizar título, contenido, descripción,
acciones y cancelación.
