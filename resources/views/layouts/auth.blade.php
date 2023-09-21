<x-layouts-base>
    <x-slot name="header">
        <ul class="flex">
            {{ Ladmin::getNavigation('navigation')->render() }}
        </ul>
        <hr>
        <details>
            <summary>{{ __('user name') }}
            </summary>
            {{ Ladmin::getNavigation('dropdown')->render() }}
        </details>
        <hr>
    </x-slot>
    <x-slot name="content">
        @isset($content)
            {{ $content }}
        @endisset
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-layouts-base>
