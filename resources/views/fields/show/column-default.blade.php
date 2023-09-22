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
        <button x-ref="button" x-on:click="toggle{{ $params['index'] }}()" :aria-expanded="open{{ $params['index'] }}"
            :aria-controls="$id('column-dropdown-button-{{ $params['index'] }}')" type="button">
            {{ $label }}
        </button>
        <div x-ref="panel" x-show="open{{ $params['index'] }}" x-transition.origin.top.left
            x-on:click.outside="close{{ $params['index'] }}($refs.button)"
            :id="$id('column-dropdown-button-{{ $params['index'] }}')" style="display: none;"
            class="absolute top-full left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
            </div>
        </div>
    </div>
</th>
