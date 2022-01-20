<x-app-layout>
    <div class="flex justify-center mx-auto pt-12">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    @if(Session::has('success'))
                        <div class="text-green-400 text-center flex flex-col" role="alert">
                            <h1 class="title-font text-2xl font-bold">{{Session::get('success')}}</h1>
                        </div>
                    @endif
                    <table class="divide-y divide-gray-300 ">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Instructeur naam
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Reden
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Startdatum
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Einddatum
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($data as $absence)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{$absence->name}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{$absence->reason}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{$absence->start_date}}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">
                                        @if($absence->end_date == null)
                                            Er is nog geen einddatum bekend
                                        @else
                                            {{$absence->end_date}}
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
