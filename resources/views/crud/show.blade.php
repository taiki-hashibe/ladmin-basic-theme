<x-layouts-auth>
    <x-slot name="content">
        <x-heading>{{ __(Ladmin::currentRoute()->getLabel()) }}</x-heading>
        <div class="mb-4">
            <label class="w-full md:w-1/2 flex items-center ps-2 pe-4 bg-white rounded-full border">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
                <form method="get">
                    <input name="keyword" type="text" autocomplete="off"
                        class="rounded w-full py-2 px-3 text-gray-700 font-normal leading-tight focus:outline-none"
                        @if (isset(request()->{"keyword"})) value="{{ request()->{"keyword"} }}" @endif
                        placeholder='{{ __('Search') }}'>
                    {{ Ladmin::filter()->except('keyword')->render() }}
                </form>
            </label>
            <div class="flex flex-wrap">
                @foreach (request()->all() as $key => $param)
                    @if ($key === 'order')
                        <form method="get" class="inline-block bg-gray-600 text-white rounded p-1 pe-2 mt-2 me-2">
                            <button class="align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path
                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                            {{ __('Order By ' . $param['by'] . ' in ' . $param['direction']) }}
                            {{ Ladmin::filter()->except('order')->render() }}
                        </form>
                    @else
                        @if ($param)
                            <form method="get" class="inline-block bg-gray-600 text-white rounded p-1 pe-2 mt-2 me-2">
                                <button class="align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-4 h-4">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                                {{ __(Str::after($key, '_') . ' : ' . $param) }}
                                {{ Ladmin::filter()->except($key)->render() }}
                            </form>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <x-card class="mb-6">
            <div class="sb-x-view overflow-hidden">
                <div class="sb-content">
                    <table class="border-collapse table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                @foreach ($fields as $i => $field)
                                    {{ $field->showColumnRender([
                                        'index' => $i,
                                    ]) }}
                                @endforeach
                                @if (Ladmin::hasDetail())
                                    <th class="border-b font-medium p-4 pl-8 pb-3 text-slate-400 text-left">
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Ladmin::currentQuery()->filter()->paginate(24) as $item)
                                <tr>
                                    @foreach ($fields as $field)
                                        {{ $field->render($item) }}
                                    @endforeach
                                    @if (Ladmin::hasDetail())
                                        <td class="px-1.5 py-1 border-b border-slate-100">
                                            <x-anchor
                                                href="{{ route(Ladmin::getDetailRouteName(), [
                                                    'primaryKey' => Ladmin::itemPrimaryKey($item),
                                                ]) }}"
                                                variant="primary">{{ __('Detail') }}</x-anchor>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </x-card>
        {{ Ladmin::currentQuery()->filter()->paginate(24)->withQueryString()->links() }}
    </x-slot>
</x-layouts-auth>
