{{-- BladCN Styled Input Component View --}}
<input
    @if($id) id="{{ $id }}" @endif
    type="{{ $type }}"
    @if($name) name="{{ $name }}" @endif
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($value) value="{{ $value }}" @endif
    @if($required) required @endif
    @if($disabled) disabled @endif
    class="{{ $getInputClasses() }}"
    {{ $attributes }}
/>
