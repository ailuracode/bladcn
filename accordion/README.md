# Accordion Component

## Props

- `type`: 'multiple' o 'single' (default: 'multiple')
- `defaultValue`: Valor inicial abierto
- `transition`: Animación (default: false)
- `...attributes` (mergeable)

## Slots

- Items `<x-accordion.item>`

## Ejemplo de uso

```blade
<x-accordion type="single" defaultValue="item-1">
    <x-accordion.item value="item-1">
        <x-accordion.trigger>Pregunta</x-accordion.trigger>
        <x-accordion.content>Respuesta</x-accordion.content>
    </x-accordion.item>
</x-accordion>
```

## Subcomponentes

### `<x-accordion.item>`

**Props:**

- `value`: Valor único del item
- `disabled`: Deshabilitar item (default: false)
  **Slots:**
- trigger, content
  **Ejemplo:**

```blade
<x-accordion.item value="item-1" disabled>
    <x-accordion.trigger>Pregunta</x-accordion.trigger>
    <x-accordion.content>Respuesta</x-accordion.content>
</x-accordion.item>
```

### `<x-accordion.trigger>`

**Props:**

- `value`: Valor del item
- `disabled`: Deshabilitar trigger
  **Slots:**
- Texto o contenido
  **Ejemplo:**

```blade
<x-accordion.trigger value="item-1">Pregunta</x-accordion.trigger>
```

### `<x-accordion.content>`

**Props:**

- `value`: Valor del item
- `transition`: Animación (default: false)
  **Slots:**
- Contenido expandido
  **Ejemplo:**

```blade
<x-accordion.content value="item-1" transition>
    Respuesta
</x-accordion.content>
```

## Detalles

Permite expandir/cerrar secciones, gestionado por Alpine.js. Subcomponentes permiten personalizar cada item, trigger y
contenido.
