<x-layouts-auth>
    <x-slot name="content">
        <ul class="flex mb-2" aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="text-slate-400" href="{{ route(Ladmin::getShowRouteName()) }}">
                    {{ __(Ladmin::currentRoute()->getLabel()) }}
                </a>
            </li>
            <li>
                <span class="text-slate-400 px-2">/</span>
            </li>
        </ul>
        <x-heading>{{ __(Ladmin::currentQuery()->getDisplayColumnValue(Ladmin::currentItemPrimaryKey())) }}</x-heading>
        <x-card>
            <form
                action="{{ route(Ladmin::getUpdateRouteName(), [
                    'primaryKey' => Ladmin::currentItemPrimaryKey(),
                ]) }}"
                method="POST">
                @csrf
                @foreach ($fields as $field)
                    {{ $field->render(Ladmin::currentItem()) }}
                @endforeach
                <button>{{ __('Submit') }}</button>
            </form>
            @if (Ladmin::hasDestroy())
                <form
                    action="{{ route(Ladmin::getDestroyRouteName(), [
                        'primaryKey' => Ladmin::currentItemPrimaryKey(),
                    ]) }}"
                    method="POST">
                    @csrf
                    <button>{{ __('Delete') }}</button>
                </form>
            @endif
        </x-card>
    </x-slot>
</x-layouts-auth>
