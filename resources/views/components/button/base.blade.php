<button
{{ $attributes->merge(['class' => '{{ .addClass($type) }} px-2 py-1.5 rounded']) }}>{{ $slot }}</button>
