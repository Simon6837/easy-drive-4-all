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
                        <div class="mt-4">
                            <a class="block w-full px-8 py-2 text-lg font-medium text-center text-white transition-colors duration-300 transform bg-indigo-600 rounded md:mt-0 hover:bg-indigo-500"
                            href="/contact">Vragen? Stuur ons een berichtje!</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 bg-gray-100">
        <div id="team" class="bg-white max-w-5xl px-6 py-16 mx-auto shadow rounded-lg">
            <div class="mb-6">
                <h2 class="text-3xl font-semibold text-gray-800">Onze instructeurs</h2>
                <p class="max-w-lg mt-4 text-gray-600">Speciaal opgeleid om u te leren rijden</p>
            </div>
            <div class="w-full flex">
                <div class="basis-1/8">
                    <div class="w-full h-full flex justify-center items-center">
                        <a onclick="previousInstructor()">
                            <i class="text-indigo-600 hover:text-indigo-500 fas fa-arrow-circle-left fa-4x cursor-pointer"></i>
                        </a>
                    </div>
                </div>
                <div class="grow p-5">
                    @for ($i = 0; $i < count($instructors); $i++)
                    @if($i == 0)
                    <div id="instructor-{{$i}}" class="instructors-overview">
                        <div class="flex flex-col justify-center items-center">
                            <div class="flex justify-center items-center">
                            @if($instructors[$i]->instructor->image)
                                <img class="h-64 w-64 object-cover object-center rounded-full"
                                        src="/assets/images/instructors/{{ $instructors[$i]->instructor->image }}">
                            @else
                                <img class="h-64 w-64 object-cover object-center rounded-full"
                                        src="assets/placeholders/User.png">
                            @endif
                            </div>
                            <h3 class="mt-4 font-medium text-gray-700">{{$instructors[$i]->first_name}} {{$instructors[$i]->prefix}} {{$instructors[$i]->last_name}}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{$instructors[$i]->instructor->description}}</p>
                        </div>
                    </div>
                    @else
                    <div id="instructor-{{$i}}" class="instructors-overview hidden">
                        <div class="flex flex-col justify-center items-center">
                            <div class="flex justify-center items-center">
                            @if($instructors[$i]->instructor->image)
                                <img class="h-64 w-64 object-cover object-center rounded-full"
                                        src="/assets/images/instructors/{{ $instructors[$i]->instructor->image }}">
                            @else
                                <img class="h-64 w-64 object-cover object-center rounded-full"
                                        src="assets/placeholders/User.png">
                            @endif
                            </div>
                            <h3 class="mt-4 font-medium text-gray-700">{{$instructors[$i]->first_name}} {{$instructors[$i]->prefix}} {{$instructors[$i]->last_name}}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{$instructors[$i]->instructor->description}}</p>
                        </div>
                    </div>
                    @endif
                    @endfor
                </div>
                <div class="basis-1/8">
                    <div class="w-full h-full flex justify-center items-center">
                        <a onclick="nextInstructor()">
                            <i class="text-indigo-600 hover:text-indigo-500 fas fa-arrow-circle-right fa-4x cursor-pointer"></i>
                        </a>                  
                    </div>
                </div>
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

    <script>
        const instructors = document.getElementsByClassName("instructors-overview");

        //Show previous instructor
        function previousInstructor() {
            for (var i = 0; i < instructors.length; i++) {

                let instructor = instructors[i];
                let idString = "instructor-";
                let idNumber = instructor.id.replace(idString,'');
                let style = window.getComputedStyle(instructor);

                //Get element that is currently being shown
                if (style.display === 'block') {
                    //Hide it
                    instructor.style.display = "none";

                    //Check if previous element in line exists                    
                    let previousElement = document.getElementById(idString + (+idNumber - 1));
                    if (previousElement != null) {
                        previousElement.style.display = "block";
                    }
                    //Otherwise grab last element from list
                    else {
                        var lastNumber = instructors.length - 1
                        previousElement = document.getElementById(idString + lastNumber);
                        previousElement.style.display = "block";
                    }
                    break;
                }      
            }
        }

        //Show next instructor
        function nextInstructor() {
            for (var i = 0; i < instructors.length; i++) {

                let instructor = instructors[i];
                let idString = "instructor-";
                let idNumber = instructor.id.replace(idString,'');
                let style = window.getComputedStyle(instructor);

                //Get element that is currently being shown
                if (style.display === 'block') {
                    //Hide it
                    instructor.style.display = "none";

                    //Check if next element in line exists                    
                    let nextElement = document.getElementById(idString + (+idNumber + 1));
                    if (nextElement != null) {
                        nextElement.style.display = "block";
                    }
                    //Otherwise grab first element from list
                    else {
                        nextElement = document.getElementById(idString + "0");
                        nextElement.style.display = "block";
                    }
                    break;
                }      
            }
        }
    </script>
</x-app-layout>

