@props(['label', 'name', 'id', 'required' => false])

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="number" name="{{ $name }}" id="{{ $id }}" class="form-control" @if($required) required @endif>

    @error($name)
        <ul class="text-sm text-red-600 space-y-1">
            <li>{{ $message }}</li>
        </ul>
    @enderror
</div>
