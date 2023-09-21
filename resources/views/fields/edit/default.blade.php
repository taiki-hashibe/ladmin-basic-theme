<div class="mb-3">
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>
    <input class="w-full rounded" type="{{ isset($type) ? $type : 'text' }}" name="{{ $name }}"
        value="{{ old($name, isset($value) ? $value : '') }}">
    @error($name)
        <span style="color:red">{{ $message }}</span>
    @enderror
</div>
