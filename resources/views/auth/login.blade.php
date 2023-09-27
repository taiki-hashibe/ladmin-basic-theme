<x-ladmin-basic-layouts-guest>
    <x-slot name="content">
        <div class="w-full flex justify-center px-8">
            <form class="mt-8 px-6 py-8 mb-6 bg-white shadow-sm w-full md:w-2/5 rounded" method="POST"
                action="{{ route(Ladmin::route()->auth()->register()->name) }}">
                @csrf

                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'email',
                    'name' => 'email',
                    'type' => 'email',
                ])

                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'password',
                    'name' => 'password',
                    'type' => 'password',
                ])

                <x-ladmin-basic-button variant="primary">{{ __('login') }} </x-ladmin-basic-button>
            </form>
        </div>
    </x-slot>
</x-ladmin-basic-layouts-guest>
