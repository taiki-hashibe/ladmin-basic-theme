<th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pb-3 text-slate-400 text-left">
    <div x-data="{
        open{{ $params['index'] }}: false,
        toggle{{ $params['index'] }}() {
            if (this.open{{ $params['index'] }}) {
                return this.close{{ $params['index'] }}()
            }
            this.$refs.button.focus()
            this.open{{ $params['index'] }} = true
        },
        close{{ $params['index'] }}(focusAfter) {
            if (!this.open{{ $params['index'] }}) return
            this.open{{ $params['index'] }} = false
            focusAfter && focusAfter.focus()
        }
    }" x-on:keydown.escape.prevent.stop="close{{ $params['index'] }}($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close{{ $params['index'] }}()"
        x-id="['column-dropdown-button-{{ $params['index'] }}']" class="relative">
        <div class="flex">
            <button x-ref="button" x-on:click="toggle{{ $params['index'] }}()"
                :aria-expanded="open{{ $params['index'] }}"
                :aria-controls="$id('column-dropdown-button-{{ $params['index'] }}')" type="button" class="me-2">
                {{ $label }}
            </button>
            <div class="flex items-center">
                @if (isset(request()->order) && request()->order['by'] === $name)
                    @if (request()->order['direction'] === 'asc')
                        <form method="get" class="flex">
                            <input type="hidden" name="order[by]" value="{{ $name }}">
                            <input type="hidden" name="order[direction]" value="desc">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-3 h-3">
                                    <path fill-rule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            @foreach (request()->all() as $key => $param)
                                @if (!is_array($param))
                                    <input type="hidden" name="{{ $key }}" value="{{ $param }}">
                                @endif
                            @endforeach
                        </form>
                    @else
                        <form method="get" class="flex">
                            <input type="hidden" name="order[by]" value="{{ $name }}">
                            <input type="hidden" name="order[direction]" value="asc">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-3 h-3">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            @foreach (request()->all() as $key => $param)
                                @if (!is_array($param))
                                    <input type="hidden" name="{{ $key }}" value="{{ $param }}">
                                @endif
                            @endforeach
                        </form>
                    @endif
                @else
                    <div>
                        <form method="get" class="h-1/2 flex">
                            <input type="hidden" name="order[by]" value="{{ $name }}">
                            <input type="hidden" name="order[direction]" value="desc">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-3 h-3">
                                    <path fill-rule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            @foreach (request()->all() as $key => $param)
                                @if (!is_array($param))
                                    <input type="hidden" name="{{ $key }}" value="{{ $param }}">
                                @endif
                            @endforeach
                        </form>
                        <form method="get" class="h-1/2 flex">
                            <input type="hidden" name="order[by]" value="{{ $name }}">
                            <input type="hidden" name="order[direction]" value="asc">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-3 h-3">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            @foreach (request()->all() as $key => $param)
                                @if (!is_array($param))
                                    <input type="hidden" name="{{ $key }}" value="{{ $param }}">
                                @endif
                            @endforeach
                        </form>
                    </div>
                @endif

            </div>

        </div>

        <div x-ref="panel" x-show="open{{ $params['index'] }}" x-transition.origin.top.left
            x-on:click.outside="close{{ $params['index'] }}($refs.button)"
            :id="$id('column-dropdown-button-{{ $params['index'] }}')" style="display: none;"
            class="absolute top-full left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 p-1 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
                <form method="get">
                    <label class="flex items-center px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                        <input name="_{{ $name }}" type="text" autocomplete="off"
                            class="rounded w-full py-2 px-3 text-gray-700 font-normal leading-tight focus:outline-none"
                            @if (isset(request()->{"_$name"})) value="{{ request()->{"_$name"} }}" @endif
                            placeholder='{{ __("Search by '$name'") }}'>
                    </label>
                    @foreach (request()->all() as $key => $param)
                        @if ($key !== "_$name" && !is_array($param))
                            <input type="hidden" name="{{ $key }}" value="{{ $param }}">
                        @endif
                        @if (is_array($param) && $key === 'order')
                            @foreach ($param as $orderKey => $orderValue)
                                <input type="hidden" name="{{ $key }}[{{ $orderKey }}]"
                                    value="{{ $orderValue }}">
                            @endforeach
                        @endif
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</th>
