<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-5">
        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form enctype="multipart/form-data" action="{{ route('carsstore')}}" type='submit' method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                    <input placeholder="type" type="text" name="type"
                                           id="type"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('type'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('type') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="model" class="block text-sm font-medium text-gray-700">Merk</label>
                                    <input placeholder="Merk" type="text" name="brand" id="brand"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('brand'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('brand') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                                    <input placeholder="Model" type="text" name="model" id="model"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('model'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('model') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="license_plate" class="block text-sm font-medium text-gray-700">Kenteken</label>
                                    <input placeholder="Kenteken" type="text" name="license_plate" id="license_plate"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('license_plate'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('license_plate') }}
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
