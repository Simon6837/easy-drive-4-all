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
                                Reden
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Startdatum
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Einddatum
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($absences as $absence)
                            <tr class="whitespace-nowrap">
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
                                <td>
                                    <div class="flex flex-row w-8/12 lg:w-full">
                                        <div class="basis-2/4">
                                            <div class="flex justify-center">
                                                <a class="cursor-pointer" href="edit/{{$absence->id}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="w-12 h-12 lg:w-6 lg:h-6 text-blue-400"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>
                                            </div>
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
