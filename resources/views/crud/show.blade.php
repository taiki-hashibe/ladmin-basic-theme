<x-layouts-auth>
    <x-slot name="content">
        <x-heading>{{ Ladmin::currentRoute()->getLabel() }}</x-heading>
        <x-card>
            <div class="sb-x-view overflow-hidden">
                <div class="sb-content">
                    <table class="border-collapse table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                @foreach (Ladmin::currentQuery()->getColumnNames() as $columnName)
                                    <th
                                        class="border-b dark:border-slate-600 font-medium p-4 pl-8 pb-3 text-slate-400 text-left">
                                        {{ __($columnName) }}
                                    </th>
                                @endforeach
                                @if (Ladmin::hasDetail())
                                    <th class="border-b font-medium p-4 pl-8 pb-3 text-slate-400 text-left">
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Ladmin::currentQuery()->paginate(24) as $item)
                                <tr>
                                    @foreach ($fields as $field)
                                        {{ $field->render($item) }}
                                    @endforeach
                                    @if (Ladmin::hasDetail())
                                        <td class="px-1.5 py-1 border-b border-slate-100">
                                            <x-anchor.primary
                                                href="{{ route(Ladmin::getDetailRouteName(), [
                                                    'primaryKey' => Ladmin::itemPrimaryKey($item),
                                                ]) }}">{{ __('Detail') }}</x-anchor.primary>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </x-card>
    </x-slot>
</x-layouts-auth>
