<x-app-layout>
    <div class="flex justify-center mx-auto pt-12">
        <div class="w-11/12 lg:w10/12 xl:w-9/12 shadow rounded-lg border-gray-200 mb-8 overflow-hidden">
            @if(Session::has('success'))
            <div class="px-4 py-2 font-semibold bg-white">
                <div class="text-green-400 text-center flex flex-col mb-4" role="alert">
                    <h1 class="title-font text-2xl font-bold">{{Session::get('success')}}</h1>
                </div>  
            </div>
            @endif
            <table class="border-collapse w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Instructeur naam</p>
                                </div>        
                            </div>
                        </th>
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
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $absence)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Instructeur naam</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
                                        <p class="">
                                            {{$absence->name}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Reden</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
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
                                    <span>Start datum</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
                                        <p class="line-clamp-3">
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
                                    <span>Eind datum</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-80 sm:max-w-80 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
                                        <p class="line-clamp-6 xl:line-clamp-4">
                                        @if($absence->end_date == null)
                                            Er is nog geen einddatum bekend
                                        @else
                                            {{$absence->end_date}}
                                        @endif
                                        </p>
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
