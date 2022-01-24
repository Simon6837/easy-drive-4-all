<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-5">
        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form enctype="multipart/form-data" action="{{ route('studentstore')}}" type='submit' method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Voornaam</label>
                                    <input placeholder="Voornaam" type="text" name="first_name"
                                           id="first_name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('first_name'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('first_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Tussenvoegsels</label>
                                    <input placeholder="Tussenvoegsels" type="text" name="prefix"
                                           id="prefix"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('prefix'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('prefix') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Achternaam</label>
                                    <input placeholder="Achternaam" type="text" name="last_name"
                                           id="last_name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('last_name'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('last_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Adres</label>
                                    <input placeholder="Adres" type="text" name="address"
                                           id="address"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('address'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">Plaats</label>
                                    <input placeholder="Plaats" type="text" name="city"
                                           id="city"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('city'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postcode</label>
                                    <input placeholder="Postcode" type="text" name="postal_code"
                                           id="postal_code"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('postal_code'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="lessons_to_go" class="block text-sm font-medium text-gray-700">Lessen tegoed</label>
                                    <input placeholder="Lessen tegoed" type="number" name="lessons_to_go"
                                           id="lessons_to_go"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('lessons_to_go'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('lessons_to_go') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input placeholder="Email" type="email" name="email"
                                           id="email"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('email'))
                                        <div class="text-red-700 text-sm">email
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord</label>
                                    <input placeholder="Wachtwoord" type="password" name="password"
                                           id="password"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('password'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Opslaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
