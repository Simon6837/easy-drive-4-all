<x-app-layout>
    <div class="w-full bg-gray-100">
        <div class="container max-w-5xl mx-auto mb-6">
            <div class="mt-8">
                <section class="mb-12 bg-white shadow rounded-lg">
                    <div class="flex justify-center">
                        <div class="w-64 h-64 sm:w-80 sm:h-80 xl:w-96 xl:h-96 mt-6 relative overflow-hidden">
                            @if(!$user->instructor->image)
                                <img class="rounded-full absolute h-full w-full object-cover"
                                     src="assets/placeholders/User.png" alt="no image found">
                            @else
                                <img class="rounded-full absolute h-full w-full object-cover"
                                     src="assets/images/instructors/{{$user->instructor->image}}" alt="no image found">
                            @endif
                        </div>
                    </div>
                    <div class="px-12 py-8">
                        <h2 class="w-full text-center text-3xl font-bold">{{$user->first_name}} {{$user->prefix}} {{$user->last_name}}</h2>
                        <div class="mt-5 flex justify-center">
                            <ul class="list-none w-80">
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-1/4 grid content-center">
                                            <i class="text-indigo-600 fas fa-at fa-2x"></i>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <a class="text-blue-600 visited:text-purple-600 hover:underline"
                                               href="mailto:{{$user->email}}">{{$user->email}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex flex-row mb-4">
                                        <div class="basis-1/4 grid content-center">
                                            <i class="text-indigo-600 fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div class="basis-3/4 grid content-center text-right">
                                            <p>{{$user->instructor->address}} {{$user->instructor->postal_code}}
                                                ,<br> {{$user->instructor->city}}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h1 class="text-2xl text-center font-semibold mb-4">Omschrijving:</h1>
                            <p class="text-center">
                                {{$user->instructor->description}}
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="container h-24 mb-4"></div>
    </div>
</x-app-layout>
