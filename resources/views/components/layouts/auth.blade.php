<x-ladmin-basic-theme::layouts.base>
    <x-slot name="header">
    </x-slot>
    <x-slot name="content">
        <main x-data="{ navOpen: false }" class="min-h-screen flex">
            <div class="h-hull hidden md:block w-2/12 px-2 bg-white border-e drop-shadow-sm">
                <div class="px-2">
                    <div class="ps-3 py-3 mb-6">
                        <h2 class="text-lg font-bold text-slate-600">{{ config('app.name') }}</h2>
                    </div>
                    <ul class="ps-1">
                        {{ Ladmin::getNavigation('navigation')->render() }}
                    </ul>
                </div>
            </div>
            <div class="w-full h-full md:w-10/12">
                <header
                    class="w-full flex justify-between md:justify-end px-6 md:px-8 py-4 border-b drop-shadow-sm bg-white">
                    <div class="block md:hidden">
                        <h2 class="text-lg font-bold text-slate-600">{{ config('app.name') }}</h2>
                    </div>
                    <div x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }
                            this.$refs.button.focus()
                            this.open = true
                        },
                        close(focusAfter) {
                            if (!this.open) return
                            this.open = false
                            focusAfter && focusAfter.focus()
                        }
                    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['header-dropdown-button']" class="relative hidden md:flex flex-col items-end w-56">
                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                            :aria-controls="$id('header-dropdown-button')" type="button" class="flex items-center">
                            <span class="font-bold text-slate-600 me-3">{{ auth()->user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)" :id="$id('header-dropdown-button')"
                            style="display: none;"
                            class="absolute top-full right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                {{ Ladmin::getNavigation('dropdown')->render() }}
                            </div>
                        </div>
                    </div>
                    <div class="block md:hidden">
                        <button @click="navOpen = true" class="w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </header>
                @isset($content)
                    <div class="px-6 md:px-8 py-10">
                        {{ $content }}
                    </div>
                @endisset
            </div>
            <div x-show="navOpen" class="fixed top-0 left-0 z-50 w-screen h-screen bg-white"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-8"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-8">
                <div>
                    <div class="w-full flex justify-end px-6 py-4">
                        <button @click="navOpen = false" class="w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <ul class="px-2 pb-4 border-b mb-3">
                        @foreach (Ladmin::getNavigation('navigation')->items as $item)
                            @include('ladmin-basic-theme::navigation.responsive', [
                                'navigation' => $item,
                                'params' => [],
                            ])
                        @endforeach
                    </ul>
                    <ul class="px-2 pb-4 mb-3">
                        @foreach (Ladmin::getNavigation('dropdown')->items as $item)
                            @include('ladmin-basic-theme::navigation.responsive', [
                                'navigation' => $item,
                                'params' => [],
                            ])
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-ladmin-basic-theme::layouts.base>
