<x-layouts-auth>
    <x-slot name="content">
        <x-heading>{{ Ladmin::currentRoute()->getLabel() }}</x-heading>
        <x-card>
            <div class="mb-3 px-0 md:px-4">
                @foreach ($fields as $field)
                    {{ $field->render(Ladmin::currentItem()) }}
                @endforeach
            </div>
            <div class="w-full flex justify-end px-0 md:px-4">
                @if (Ladmin::hasEdit())
                    <x-anchor.primary
                        href="{{ route(Ladmin::getEditRouteName(), [
                            'primaryKey' => Ladmin::currentItemPrimaryKey(),
                        ]) }}">{{ __('Edit') }}</x-anchor.primary>
                @endif
                @if (Ladmin::hasDestroy())
                    <x-anchor.danger
                        href="{{ route(Ladmin::getDestroyRouteName(), [
                            'primaryKey' => Ladmin::currentItemPrimaryKey(),
                        ]) }}">{{ __('Edit') }}</x-anchor.danger>
                @endif
            </div>
        </x-card>
    </x-slot>
</x-layouts-auth>
