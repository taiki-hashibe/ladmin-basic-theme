<x-layouts-auth>
    <x-slot name="content">
        <x-heading>{{ __(Ladmin::currentRoute()->getLabel()) }}</x-heading>
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
