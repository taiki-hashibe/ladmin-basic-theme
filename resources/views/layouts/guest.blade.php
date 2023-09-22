<x-layouts-base>
    <x-slot name="header">
        <header class="w-full flex justify-start px-8 py-3 mb-8">
            <div>
                <h1 class="text-lg font-bold text-slate-600">{{ config('app.name') }}</h1>
            </div>
        </header>
    </x-slot>
    <x-slot name="content">
        @isset($content)
            {{ $content }}
        @endisset
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-layouts-base>
