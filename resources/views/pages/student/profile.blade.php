<x-app-layout>
    <div class="w-full bg-gray-100">
        <div class="container max-w-5xl mx-auto mb-6">
            <div class="mt-8">
                <section class="mb-12 bg-white shadow rounded-lg">
                    <div class="px-12 py-8">
                        <div class="flex justify-center">
                            <ul class="list-none w-80">
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-2/4 grid content-center">
                                            <b>Voornaam:</b>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <input value="{{$user->first_name}}" type="text" disabled class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-2/4 grid content-center">
                                            <b>Achternaam:</b>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <input value="{{$user->last_name}}" type="text" disabled class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-2/4 grid content-center">
                                            <b>Email:</b>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <input value="{{$user->email}}" type="email" disabled class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-2/4 grid content-center">
                                            <b>Adres:</b>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <input value="{{$user->student->address}}" type="text" disabled class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-2/4 grid content-center">
                                            <b>Postcode:</b>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <input value="{{$user->student->postal_code}}" type="text" disabled class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-2/4 grid content-center">
                                            <b>Plaatsnaam:</b>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <input value="{{$user->student->city}}" type="text" disabled class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="container h-24 mb-4"></div>
    </div>
</x-app-layout>
