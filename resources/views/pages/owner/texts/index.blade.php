<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="flex justify-center mx-auto pt-12">
        <div class="w-11/12 lg:w10/12 xl:w-9/12 shadow rounded-lg border-gray-200 mb-8 overflow-hidden">
            @if(Session::has('success'))
                <script>
                    swal({
                        title: "{{Session::get('success')}}",
                        icon: "success",
                        button: "Ok!",
                    });
                </script>
            @endif
            <table class="border-collapse w-full">
                <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Pagina</p>
                            </div>
                        </div>
                    </th>
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
                                <p>Text</p>
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
                @foreach($data as $item)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Pagina</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-96 sm:max-w-96 lg:w-40 lg:max-w-40 xl:w-56 xl:max-w-56 break-words">
                                        <p class="line-clamp-5 xl:line-clamp-3">
                                            {{$item->page}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Title</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-96 sm:max-w-96 lg:w-40 lg:max-w-40 xl:w-56 xl:max-w-56 break-words">
                                        <p class="line-clamp-5 xl:line-clamp-3">
                                            {{$item->title}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Text</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-48 max-w-48 sm:w-96 sm:max-w-96 lg:w-80 lg:max-w-80 2xl:w-96 2xl:max-w-96 break-words">
                                     <textarea style="resize: vertical;" class="w-full text-sm text-gray-500" rows="6" disabled>{{$item->text}}</textarea>
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
                                        <a class="cursor-pointer" href="text/edit/{{$item->id}}">
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
