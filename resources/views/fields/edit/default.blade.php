<div class="mb-4">
    <label for="{{ $name }}" class="block text-slate-500 text-sm font-bold  mb-1.5">{{ $label }}</label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        type="{{ isset($type) ? $type : 'text' }}" name="{{ $name }}"
        value="{{ old($name, isset($value) ? $value : '') }}">
    @error($name)
        <span style="color:red">{{ $message }}</span>
    @enderror
</div>
