<x-ladmin-basic-layouts-auth>
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
            <li class="inline-flex items-center">
                <a class="text-slate-400"
                    href="{{ Ladmin::hasCurrentItem()
                        ? route(Ladmin::getDetailRouteName(), [
                            'primaryKey' => Ladmin::currentItemPrimaryKey(),
                        ])
                        : route(Ladmin::getShowRouteName()) }}">
                    @if (Ladmin::hasCurrentItem())
                        {{ __(Ladmin::currentQuery()->getDisplayColumnValue(Ladmin::currentItemPrimaryKey())) }}
                    @else
                        {{ __('Create') }}
                    @endif
                </a>
            </li>
            <li>
                <span class="text-slate-400 px-2">/</span>
            </li>
        </ul>
        <x-ladmin-basic-heading>
            @if (Ladmin::hasCurrentItem())
                {{ __(Ladmin::currentQuery()->getDisplayColumnValue(Ladmin::currentItemPrimaryKey())) }}
            @else
                {{ __('Create') }}
            @endif
        </x-ladmin-basic-heading>
        <x-ladmin-basic-card>
            <form
                action="{{ Ladmin::hasCurrentItem()
                    ? route(Ladmin::getUpdateRouteName(), [
                        'primaryKey' => Ladmin::currentItemPrimaryKey(),
                    ])
                    : route(Ladmin::getCreateRouteName()) }}"
                method="POST">
                @csrf
                @foreach ($fields as $field)
                    {{ $field->render(Ladmin::hasCurrentItem() ? Ladmin::currentItem() : null) }}
                @endforeach
                <div class="w-full flex justify-end px-0">
                    @if (Ladmin::hasCurrentItem())
                        <x-ladmin-basic-button variant="primary"
                            class="@if (Ladmin::hasDestroy()) me-2 @endif">{{ __('Submit') }}</x-ladmin-basic-button>
                        @if (Ladmin::hasDestroy())
                            <x-ladmin-basic-button type="button" variant="danger" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'delete-modal')">{{ __('Delete') }}</x-ladmin-basic-button>
                        @endif
                    @else
                        <x-ladmin-basic-button variant="primary">{{ __('Submit') }}</x-ladmin-basic-button>
                    @endif
                </div>
            </form>
        </x-ladmin-basic-card>
        @if (Ladmin::hasCurrentItem() && Ladmin::hasDestroy())
            <x-ladmin-basic-modal name="delete-modal" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form
                    action="{{ route(Ladmin::getDestroyRouteName(), [
                        'primaryKey' => Ladmin::currentItemPrimaryKey(),
                    ]) }}"
                    method="POST" class="p-6">
                    @csrf

                    <p class="mt-1 text-gray-600">
                        {{ __('Are you sure you want to delete') }}
                        <span
                            class="font-bold">{{ __(Ladmin::currentQuery()->getDisplayColumnValue(Ladmin::currentItemPrimaryKey())) }}</span>?
                    </p>

                    <div class="mt-6 flex justify-end">
                        <x-ladmin-basic-button type="button" variant="primary" x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-ladmin-basic-button>

                        <x-ladmin-basic-button variant="danger" class="ml-3">
                            {{ __('Delete') }}
                        </x-ladmin-basic-button>
                    </div>
                </form>
            </x-ladmin-basic-modal>
        @endif
    </x-slot>
</x-ladmin-basic-layouts-auth>
