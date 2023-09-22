<li>
    <a href="{{ route($navigation->routeName, $params) }}"
        class="flex items-center font-semibold text-slate-600 gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-2 py-1.5 text-left hover:bg-gray-100 disabled:text-gray-500">
        {{ __($navigation->label) }}
    </a>
</li>
