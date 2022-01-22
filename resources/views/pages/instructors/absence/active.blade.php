<x-app-layout>
    <div class="flex justify-center mx-auto pt-12">
        <div class="w-11/12 lg:w10/12 xl:w-9/12 shadow rounded-lg border-gray-200 mb-8 overflow-hidden">
            <div class="px-4 py-2 font-semibold bg-white">
                @if(Session::has('success'))
                <div class="text-green-400 text-center flex flex-col mb-4" role="alert">
                    <h1 class="title-font text-2xl font-bold">{{Session::get('success')}}</h1>
                </div>
                @endif
                <div class="md:flex flex-row w-full justify-center lg:justify-start lg:w-10/12 xl:w-8/12 2xl:w-6/12">
                    <div class="basis-3/6 md:mr-4">
                        <a href="{{ route('absencecreate') }}">
                            <button
                                class="w-full mb-4 py-6 px-8 lg:py-2 lg:px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded text-sm font-bold transition duration-200">
                                Ziekmelding toevoegen
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <table class="border-collapse w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Reden</p>
                                </div>        
                            </div>
                        </th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Startdatum</p>
                                </div>        
                            </div>
                        </th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Einddatum</p>
                                </div>        
                            </div>
                        </th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Bewerken</p>
                                </div>        
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($absences as $absence)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Reden</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-40 lg:max-w-40 xl:w-56 xl:max-w-56 break-words">
                                        <p class="">
                                            {{$absence->reason}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Startdatum</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-40 lg:max-w-40 xl:w-56 xl:max-w-56 break-words">
                                        <p class="line-clamp-5 xl:line-clamp-3">
                                            {{$absence->start_date}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Einddatum</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-80 lg:max-w-80 2xl:w-96 2xl:max-w-96 break-words">
                                        @if($absence->end_date == null)
                                            Er is nog geen einddatum bekend
                                        @else
                                            {{$absence->end_date}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Bewerken</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <div class="flex justify-center lg:w-24">
                                        <a class="cursor-pointer" href="edit/{{$absence->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-12 h-12 lg:w-8 lg:h-8 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container h-24 mb-4"></div>
</x-app-layout>
