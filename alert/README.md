# Alert Component

## Props

- `variant`: Estilo visual (default: 'default')
- `...attributes` (mergeable)

## Slots

- Contenido, acciones

## Ejemplo de uso

```blade
<x-alert variant="destructive">
    <x-alert.title>Error</x-alert.title>
    <x-alert.description>Hubo un problema.</x-alert.description>
    <x-alert.action>
        <x-button>OK</x-button>
    </x-alert.action>
</x-alert>
```

## Subcomponentes

### `<x-alert.title>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto del título
  **Ejemplo:**

```blade
<x-alert.title>Alerta</x-alert.title>
```

### `<x-alert.description>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto descriptivo
  **Ejemplo:**

```blade
<x-alert.description>Hubo un problema.</x-alert.description>
```

### `<x-alert.action>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Botón u otro elemento de acción
  **Ejemplo:**

```blade
<x-alert.action>
    <x-button>OK</x-button>
</x-alert.action>
```

## Detalles

Mensaje de alerta, configurable por variante. Subcomponentes permiten personalizar título, descripción y acciones.
