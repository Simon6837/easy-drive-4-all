<x-app-layout>
    <div class="flex justify-center mx-auto pt-12">
        <div class="w-11/12 lg:w10/12 xl:w-9/12 shadow rounded-lg border-gray-200 mb-8 overflow-hidden">
            <table class="border-collapse w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Title</p>
                                </div>        
                            </div>
                        </th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Notificatie</p>
                                </div>        
                            </div>
                        </th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                            <div class="flex">
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <p>Geldig tot</p>
                                </div>        
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Title</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-96 sm:max-w-96 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
                                        <p class="">
                                            {{$notification->title}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Notificatie</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-96 sm:max-w-96 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
                                        <p class="">
                                            {{$notification->notification}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Geldig tot</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-96 sm:max-w-96 lg:w-28 lg:max-w-28 xl:w-36 xl:max-w-36 2xl:w-56 2xl:max-w-56 break-words">
                                        <p class="">
                                            {{$notification->valid_until}}
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
