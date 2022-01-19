<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-5">
        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form enctype="multipart/form-data" action="{{ route('instructorupdate')}}" type='submit' method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <input value="{{$user->id}}" type="text" name="id" id="id" style="display:none"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Voornaam</label>
                                    <input value="{{$user->first_name}}" placeholder="Voornaam" type="text"
                                           name="first_name"
                                           id="first_name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('first_name'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('first_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="type"
                                           class="block text-sm font-medium text-gray-700">Tussenvoegsels</label>
                                    <input value="{{$user->prefix}}" placeholder="Tussenvoegsels" type="text"
                                           name="prefix"
                                           id="prefix"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('prefix'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('prefix') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="last_name"
                                           class="block text-sm font-medium text-gray-700">Achternaam</label>
                                    <input value="{{$user->last_name}}" placeholder="Achternaam" type="text"
                                           name="last_name"
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
                                    <input value="{{$user->instructor->address}}" placeholder="Adres" type="text"
                                           name="address"
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
                                    <input value="{{$user->instructor->city}}" placeholder="Plaats" type="text"
                                           name="city"
                                           id="city"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('city'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="postal_code"
                                           class="block text-sm font-medium text-gray-700">Postcode</label>
                                    <input value="{{$user->instructor->postal_code}}" placeholder="Postcode" type="text"
                                           name="postal_code"
                                           id="postal_code"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('postal_code'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Omschrijving</label>
                                    <input value="{{$user->instructor->description}}" placeholder="Omschrijving"
                                           type="text" name="description"
                                           id="description"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('description'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input value="{{$user->email}}" placeholder="Email" type="email" name="email"
                                           id="email"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('email'))
                                        <div class="text-red-700 text-sm">email
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-span-4 lg:col-span-2">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Foto</label>
                                    <input placeholder="Type" type="file" name="image" id="image"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('image'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('image') }}
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
    </div>
</x-app-layout>
