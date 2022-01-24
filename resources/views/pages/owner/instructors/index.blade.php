<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="flex justify-center mx-auto pt-12">
        <div class="w-11/12 xl:w-10/12 shadow rounded-lg border-gray-200 mb-8 overflow-hidden">
            <div class="px-4 py-2 font-semibold bg-white">
                @if(Session::has('success'))
                    <script>
                        swal({
                            title: "{{Session::get('success')}}",
                            icon: "success",
                            button: "Ok!",
                        });
                    </script>
                @endif
                <div class="md:flex flex-row w-full justify-center lg:justify-start lg:w-10/12 xl:w-8/12 2xl:w-6/12">
                    <div class="basis-3/9 md:mr-4">
                        <a href="{{ route('instructorcreate') }}">
                            <button
                                class="w-full mb-4 py-6 px-8 lg:py-2 lg:px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded text-sm font-bold transition duration-200">
                                Instructeur toevoegen
                            </button>
                        </a>
                    </div>
                    <div class="basis-3/9 md:mr-4">
                        <button onclick="openDialogForMultipleItems()"
                                id="multiple-deletion-button"
                                class="w-full mb-4 py-6 px-8 lg:py-2 lg:px-4 hidden bg-red-500 hover:bg-red-400 text-white rounded text-sm font-bold transition duration-200">
                            Instructeur(s) verwijderen
                        </button>
                    </div>
                    <div class="basis-3/9">
                        <a href="{{ route('generateinstructors') }}">
                            <button
                                class="w-full mb-4 py-6 px-8 lg:py-2 lg:px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded text-sm font-bold transition duration-200">
                                Naar PDF exporteren
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
                                <p>Select</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Foto</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>ID</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Naam</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Email</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Adres</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Plaats</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Postcode</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:hidden 2xl:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Omschrijving</p>
                            </div>
                        </div>
                    </th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-500 hidden lg:table-cell">
                        <div class="flex">
                            <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                <p>Actie</p>
                            </div>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($instructors as $instructor)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Select</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <input type="checkbox" class="w-6 h-6 delete-multiple-items" value="{{$instructor->id}}">
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Foto</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <div class="flex justify-center">
                                    @if($instructor->instructor->image)
                                        <div class="relative overflow-hidden h-32 w-32 sm:h-64 sm:w-64 lg:h-24 lg:w-24">
                                            <img class="absolute w-full h-32 sm:h-64 lg:h-24 object-cover" src="/assets/images/instructors/{{ $instructor->instructor->image }}">
                                        </div>
                                    @else
                                        <div class="text-sm text-gray-900">
                                            Geen foto ingesteld
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>ID</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 flex justify-center">
                                    <div class="w-12 max-w-12 lg:w-6 lg:max-w-6 break-words">
                                        {{$instructor->id}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Naam</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 max-w-full flex justify-center">
                                    <div class="w-48 max-w-48 md:w-96 md:max-w-96 lg:w-24 lg:max-w-24 xl:w-36 lg:max-w-36 break-words">
                                        <p class="line-clamp-5">
                                            {{$instructor->first_name}} {{$instructor->prefix}} {{$instructor->last_name}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Email</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 max-w-full flex justify-center">
                                    <div class="w-48 sm:w-80 max-w-36 lg:w-24 lg:max-w-24 xl:w-36 xl:max-w-36 break-words">
                                        {{$instructor->email}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Adres</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 max-w-full flex justify-center">
                                    <div class="w-24 max-w-24 lg:w-16 lg:max-w-16 xl:w-24 xl:max-w-24 break-words text-center">
                                        {{$instructor->instructor->address}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Plaats</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 max-w-full flex justify-center">
                                    <div class="w-48 sm:w-full break-words">
                                        {{$instructor->instructor->city}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Postcode</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 max-w-full flex justify-center">
                                    <div class="w-24 max-w-24 md:w-16 md:max-w-16 xl:w-24 xl:max-w-24 break-words">
                                        {{$instructor->instructor->postal_code}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t lg:hidden 2xl:table-cell">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Omschrijving</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2 max-w-full flex justify-center">
                                    <div class="w-48 max-w-48 md:w-96 md:max-w-96 lg:w-36 lg:max-w-36 break-words">
                                        <p class="line-clamp-5 xl:line-clamp-3">
                                            {{$instructor->instructor->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-full lg:w-auto text-center p-0 border-t">
                            <div class="flex flex-row h-full">
                                <div
                                    class="basis-2/6 md:basis-1/6 lg:hidden bg-gray-200 text-gray-500 text-xs font-bold uppercase flex justify-center items-center px-3 py-2">
                                    <span>Actie</span>
                                </div>
                                <div class="basis-4/6 md:basis-5/6 px-3 py-2">
                                    <div class="flex justify-center">
                                        <div class="flex flex-row w-8/12 lg:w-full">
                                            <div class="basis-2/4">
                                                <div class="flex justify-center">
                                                    <a class="cursor-pointer" href="instructor/edit/{{$instructor->id}}">
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
                                            <div class="basis-2/4">
                                                <div class="flex justify-center">
                                                    <a class="cursor-pointer" onclick="openDialog({{$instructor->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-12 h-12 lg:w-6 lg:h-6 text-red-400"
                                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
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
        </div>
    </div>
    <div class="container h-24 mb-4"></div>
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
                    <p class="text-sm text-gray-500 px-8">
                        Weet je zeker dat je <span id="deletionAmount"></span> item(s) wilt verwijderen? Dit kan niet
                        ongedaan worden gemaakt.
                    </p>
                </div>
                <!--footer-->
                <div class="p-3 mt-2 text-center space-x-4">
                    <div class="mx-auto w-full sm:w-8/12 flex flex-row">
                        <div class="w-full mr-2 md:mr-4">
                            <button type="submit" onclick="deleteItem()"
                                    class="mb-2 w-9/12 sm:w-full mx-auto md:mb-0 bg-red-500 border border-red-500 px-3 py-2 md:px-5 md:py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">
                                Verwijderen
                            </button>
                        </div>
                        <div class="w-full">
                            <button onclick="closeDialog()"
                                    class="mb-2 w-9/12 sm:w-full mx-auto md:mb-0 bg-white px-3 py-2 md:px-5 md:py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                Annuleren
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const itemIDs = [];
            const checkboxes = document.querySelectorAll('.delete-multiple-items');

            window.onload = function () {
                //Whenever the window loads go through all the checkboxes that are used
                //when selecting multiple items to delete
                checkboxes.forEach((checkbox) => {
                    //Uncheck any already checked checkboxes
                    checkbox.checked = false;
                    //For each checkbox add them to a change event
                    checkbox.addEventListener('change', (event) => {
                        //Assign to function
                        displayDeleteButtonForMultipleItems(event);
                    });
                });
            }

            function displayDeleteButtonForMultipleItems(event) {
                const hiddenButton = document.getElementById("multiple-deletion-button");
                if (event.target.checked) {
                    if (window.getComputedStyle(hiddenButton).display == "none") {
                        hiddenButton.style.display = "block";
                    }
                } else {
                    let checked = false;
                    checkboxes.forEach((checkbox) => {
                        if (checkbox.checked) {
                            checked = true;
                        }
                    });
                    if (!checked) {
                        //If no checkboxes are checked hide the delete button
                        if (window.getComputedStyle(hiddenButton).display == "block") {
                            hiddenButton.style.display = "none";
                        }
                    }
                }
            }

            function openDialog(id) {
                itemIDs.push(id);

                document.getElementById("deletionAmount").innerHTML = "1";
                document.getElementById('modal').style.display = "";
            }

            function openDialogForMultipleItems() {
                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        itemIDs.push(checkbox.value);
                    }
                });

                document.getElementById("deletionAmount").innerHTML = itemIDs.length;
                document.getElementById('modal').style.display = "";
            }

            function closeDialog() {
                hideDialog();
                itemIDs.length = 0;
            }

            function deleteItem() {
                hideDialog();
                window.location.replace(`/instructor/delete/${itemIDs}`);
                itemIDs.length = 0;
            }

            function hideDialog() {
                document.getElementById('modal').style.display = "none";
            }
        </script>
</x-app-layout>
