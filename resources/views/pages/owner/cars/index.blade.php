<x-app-layout>
    <div class="flex justify-center mx-auto pt-12">
        <div class="w-11/12 lg:w10/12 xl:w-9/12 shadow rounded-lg border-gray-200 mb-8 overflow-hidden">
            <table class="border-collapse w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Select</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Foto</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">ID</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Merk</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Model</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Type</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Kenteken</th>
                        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">Actie</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Select</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <input type="checkbox" class="w-6 h-6">
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Foto</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <div class="flex justify-center">
                                        <img class="w-6/12 lg:w-24" src="/assets/images/cars/{{ $car->image }}">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>ID</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    {{$car->id}}
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Merk</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    {{$car->brand}}
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Model</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    {{$car->model}}
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Type</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    {{$car->type}}
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Kenteken</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    {{$car->license_plate}}
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Actie</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <div class="flex justify-center">
                                        <div class="flex flex-row w-8/12 lg:w-full">
                                            <div class="basis-2/4">
                                                <div class="flex justify-center">
                                                    <a class="cursor-pointer" href="cars/edit/{{$car->id}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 lg:w-6 lg:h-6 text-blue-400"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="basis-2/4">
                                                <div class="flex justify-center">
                                                    <a class="cursor-pointer" onclick="openDialog({{$car->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 lg:w-6 lg:h-6 text-red-400"
                                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="px-4 py-2 font-semibold bg-white">
                <a href="{{ route('carscreate') }}">
                    <button
                        class=" py-2 px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded text-sm font-bold transition duration-200">
                        Auto toevoegen
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div id="modal" style="display:none;"
         class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <div class="absolute bg-black opacity-20 inset-0 z-0"></div>
        <div class="w-full max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Weet je het zeker?</h2>
                        <p class="text-sm text-gray-500 px-8">Wil je echt dit bericht verwijderen, dit kan niet worden
                            teruggezet.</p>
                </div>
                <!--footer-->
                <div class="p-3  mt-2 text-center space-x-4 md:block">
                    <button onclick="closeDialog()"
                            class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Annuleren
                    </button>
                    <button type="submit" onclick="deleteUser()"
                            class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">
                        Verwijderen
                    </button>
                </div>
            </div>
        </div>
        <script>
            let gID = "";

            function openDialog(id) {
                gID = id;

                let modal = document.getElementById('modal');
                modal.style.display = "";
            }

            function closeDialog() {
                let modal = document.getElementById('modal');
                modal.style.display = "none";

                gID = "";
            }

            function deleteUser() {
                let modal = document.getElementById('modal');
                modal.style.display = "none";

                window.location.replace(`/cars/delete/${gID}`);

                gID = "";
            }
        </script>
</x-app-layout>
