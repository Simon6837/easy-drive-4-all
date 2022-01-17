<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-5">
        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form enctype="multipart/form-data" action="{{ route('notificationsupdate')}}" type='submit' method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <input value="{{$notification->id}}" type="text" name="id" id="id" style="display:none"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                                    <select name="role" id="role" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option>leerling</option>
                                        <option>instructeur</option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('role') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
                                    <input value="{{$notification->title}}" type="text" name="title" id="title"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('title'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="notification"
                                           class="block text-sm font-medium text-gray-700">Melding</label>
                                    <input value="{{$notification->notification}}" type="text" name="notification"
                                           id="notification"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('notification'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('notification') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="valid_until"
                                           class="block text-sm font-medium text-gray-700">Melding</label>
                                    <input value="{{$notification->valid_until}}" type="text" name="valid_until"
                                           id="valid-until"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @if ($errors->has('valid_until'))
                                        <div class="text-red-700 text-sm">
                                            {{ $errors->first('valid_until') }}
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
