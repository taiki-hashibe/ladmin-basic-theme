<x-ladmin-basic-layouts-auth>

    <x-slot name="content">
        <x-ladmin-basic-card class="mb-6">
            <form method="post" action="{{ Ladmin::route()->profile()->update()->url }}">
                @csrf
                <div class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">{{ __('Profile Information') }}</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update your account's profile information and email address.") }}</p>
                </div>
                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'username',
                    'name' => 'name',
                    'value' => auth()->user()->name,
                ])

                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'email',
                    'name' => 'email',
                    'value' => auth()->user()->email,
                ])

                <x-ladmin-basic-button variant="primary">{{ __('Save') }}</x-ladmin-basic-button>
            </form>
        </x-ladmin-basic-card>
        <x-ladmin-basic-card class="mb-6">
            <form method="post" action="{{ Ladmin::route()->profile()->passwordChange()->url }}">
                @csrf
                <div class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">{{ __('Change Password') }}</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
                </div>
                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'current password',
                    'name' => 'current_password',
                ])
                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'new password',
                    'name' => 'password',
                ])
                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'new password confirmation',
                    'name' => 'password_confirmation',
                ])
                <div class="flex items-center gap-4">
                    <x-ladmin-basic-button variant="primary">{{ __('Save') }}</x-ladmin-basic-button>

                    @if (session('status') === 'password-updated')
                        <p>{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </x-ladmin-basic-card>
        <x-ladmin-basic-card class="mb-6">
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-900">{{ __('Delete Account') }}</h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
            </div>
            <x-ladmin-basic-button type="button" variant="danger" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-modal')">{{ __('Delete') }}</x-ladmin-basic-button>
        </x-ladmin-basic-card>
        <x-ladmin-basic-modal name="delete-modal" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form action="{{ Ladmin::route()->profile()->destroy()->url }}" method="POST" class="p-6">
                @csrf
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        enter your password to confirm you would like to permanently delete your account.') }}
                </p>
                <p class="mt-1 text-gray-600">
                    {{ __('Are you sure you want to delete ?') }}
                </p>
                @include('ladmin-basic-theme::fields.edit.default', [
                    'label' => 'password',
                    'name' => 'password',
                ])
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
    </x-slot>
</x-ladmin-basic-layouts-auth>
