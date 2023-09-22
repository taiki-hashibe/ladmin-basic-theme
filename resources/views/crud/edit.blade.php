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
            <li class="inline-flex items-center">
                <a class="text-slate-400"
                    href="{{ route(Ladmin::getDetailRouteName(), [
                        'primaryKey' => Ladmin::currentItemPrimaryKey(),
                    ]) }}">
                    {{ __(Ladmin::currentQuery()->getDisplayColumnValue(Ladmin::currentItemPrimaryKey())) }}
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
                <div class="w-full flex justify-end px-0">
                    <x-button variant="primary"
                        class="@if (Ladmin::hasDestroy()) me-2 @endif">{{ __('Submit') }}</x-button>
                    @if (Ladmin::hasDestroy())
                        <x-button type="button" variant="danger" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'delete-modal')">{{ __('Delete') }}</x-button>
                    @endif
                </div>
            </form>
        </x-card>
        @if (Ladmin::hasDestroy())
            <x-modal name="delete-modal" :show="$errors->userDeletion->isNotEmpty()" focusable>
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
                        <x-button type="button" variant="primary" x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-button>

                        <x-button variant="danger" class="ml-3">
                            {{ __('Delete') }}
                        </x-button>
                    </div>
                </form>
            </x-modal>
        @endif
    </x-slot>
</x-layouts-auth>
