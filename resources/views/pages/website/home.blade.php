<x-app-layout>
    <header class="bg-gray-800" x-data="{ isOpen: false }">
        <section class="flex items-center justify-center" style="height: 300px;">
            <div class="text-center">
                <p class="text-xl font-medium tracking-wider text-gray-300">Rijlessen voor fysiek beperkte jongeren</p>
                <h2 class="mt-6 text-3xl font-bold text-white md:text-5xl">EasyDrive4All</h2>

                <div class="flex justify-center mt-8">
                    <a class="px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform bg-indigo-600 rounded hover:bg-indigo-500"
                       href="{{ route('home'). '#signup' }}">Schrijf je in</a>
                </div>
            </div>
        </section>
    </header>

    <section class="mt-5 bg-gray-100">
        <div class="bg-white max-w-5xl px-6 py-16 mx-auto shadow rounded-lg">
            <div class="items-center">
                <div class="w-full">
                    <h2 class="text-3xl font-semibold text-gray-800">Over ons</h2>
                    <p class="mt-4 text-gray-600">{{$text->text}}
                        <a class="block w-full px-8 py-2 mt-6 text-lg font-medium text-center text-white transition-colors duration-300 transform bg-indigo-600 rounded md:mt-0 hover:bg-indigo-500"
                           href="/contact">Vragen? Stuur ons een berichtje!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 bg-gray-100">
        <div id="team" class="bg-white max-w-5xl px-6 py-16 mx-auto text-center shadow rounded-lg">
            <h2 class="text-3xl font-semibold text-gray-800">Onze instructeurs</h2>
            <p class="max-w-lg mx-auto mt-4 text-gray-600">Speciaal opgeleid om u te leren rijden</p>
            <div class="grid gap-8 mt-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach($instructors as $instructor)
                    <div>
                        @if($instructor->instructor->image)
                            <img style="height: 220px" class="object-cover object-center rounded-full"
                                 src="/assets/images/instructors/{{ $instructor->instructor->image }}">
                        @else
                            <img style="height: 220px" class="object-cover object-center rounded-full"
                                 src="assets/placeholders/User.png">
                        @endif
                        <h3 class="mt-2 font-medium text-gray-700">{{$instructor->first_name}} {{$instructor->prefix}} {{$instructor->last_name}}</h3>
                        <p class="text-sm text-gray-600">{{$instructor->instructor->description}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mt-5 bg-gray-100">
        <div class="bg-white max-w-5xl px-6 py-16 mx-auto rounded-lg shadow">
            <div class="items-center">
                @if(Session::has('success'))
                    <div class="text-green-400 text-center flex flex-col" role="alert">
                        <h1 class="title-font text-2xl font-bold">{{Session::get('success')}}</h1>
                    </div>
                @endif
                <form method="POST" action="{{ route('signup') }}" id="signup"
                      class="w-full bg-white rounded p-6 space-y-4">
                    @csrf
                    <div class="mb-4">
                        <h2 class="text-xl font-bold">Meld je aan</h2>
                    </div>
                    <div>
                        <input name="firstName" value="{{ old('firstName') }}"
                               class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                               type="text" placeholder="Voornaam">
                    </div>
                    @if ($errors->has('firstName'))
                        <div class="text-red-700 text-sm">
                            {{ $errors->first('firstName') }}
                        </div>
                    @endif
                    <div>
                        <input name="lastName" value="{{ old('lastName') }}"
                               class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                               type="text" placeholder="Achternaam">
                    </div>
                    @if ($errors->has('lastName'))
                        <div class="text-red-700 text-sm">
                            {{ $errors->first('lastName') }}
                        </div>
                    @endif
                    <div>
                        <input name="birthDate" value="{{ old('birthDate') }}"
                               class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                               type="date" placeholder="Geboorte datum">
                    </div>
                    @if ($errors->has('birthDate'))
                        <div class="text-red-700 text-sm">
                            {{ $errors->first('birthDate') }}
                        </div>
                    @endif
                    <div>
                        <input name="phone" value="{{ old('phone') }}"
                               class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                               type="number" placeholder="Telefoon nummer">
                    </div>
                    @if ($errors->has('phone'))
                        <div class="text-red-700 text-sm">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <div>
                        <input name="email" value="{{ old('email') }}"
                               class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600"
                               type="email" placeholder="Email">
                    </div>
                    @if ($errors->has('email'))
                        <div class="text-red-700 text-sm">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div>
                        <button type="submit"
                                class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded text-sm font-bold transition duration-200">
                            Meld je aan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="container h-24 mb-4"></div>
</x-app-layout>

