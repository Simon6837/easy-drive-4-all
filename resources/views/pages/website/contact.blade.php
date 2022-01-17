<x-app-layout>
	<div class="bg-gray-100 relative flex items-top justify-center min-h-screen bg-white sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white shadow shadow-gray-600 rounded-lg overflow-hidden">
                @if(Session::has('success')) 
                    <div class="m-2 h-11 items-center bg-blue-500 text-white rounded-lg text-sm font-bold px-4 py-3" role="alert">
                        {{ Session::get('success') }} 
                        @php 
                            Session::forget('success'); 
                        @endphp 
                    </div> 
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 mr-2 bg-white sm:rounded-lg">
                        <h1 class="text-4xl sm:text-5xl text-gray-800 font-extrabold tracking-tight">
                            Contact info
                        </h1>
                        <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 mt-2">
                            Voor meer informatie stuur een bericht
                        </p>

                        <div class="flex items-center mt-8 text-gray-600">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-50">
                                Mozartlaan 15, 8031AA<br>
								Zwolle, Overijssel,                                
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                +31 123456789
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                info@drive4all.org
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('contact.store') }}" class="p-6 flex flex-col justify-center">
						@csrf
                        <div class="flex flex-col">
                            <label for="name" class="hidden">Full Name</label>
                            <input type="name" name="name" id="name" placeholder="Naam" value="{{ old('name') }}" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white border border-gray-400 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                                @if ($errors->has('name')) 
                                    <p class="ml-4 text-red-600">{{ $errors->first('name') }}</p>
                                @endif 
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="email" class="hidden">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white border border-gray-400 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                                {{-- @if ($errors->has('email')) 
                                    <p class="ml-4 text-red-600">{{ $errors->first('email') }}</p>
                                @endif  --}}
                        </div>

						<div class="flex flex-col mt-2">
                            <label for="opject" class="hidden">Onderwerp</label>
                            <input type="opject" name="opject" id="opject" placeholder="Onderwerp" value="{{ old('opject') }}" class="w-100 h-14 mt-2 py-3 px-3 rounded-lg bg-white border border-gray-400 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                                @if ($errors->has('opject')) 
                                    <p class="ml-4 text-red-600">{{ $errors->first('opject') }}</p>
                                @endif 
                        </div>

						<div class="flex flex-col mt-2">
							<label for="message" class="hidden">Message</label>
							<textarea id="message" name="message" placeholder="Message" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white border border-gray-400 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">{{ old('message') }}</textarea>
                                @if ($errors->has('message')) 
                                    <p class="ml-4 text-red-600">{{ $errors->first('message') }}</p>
                                @endif 
						  </div>

                        <button id="store" type="submit" class="md:w-32 bg-indigo-600 bg-blue-dark hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-300 transition ease-in-out duration-300">
                            Submit
                        </button>
                    </form>
                </div>
				<div class="mt-2 sm:rounded-lg">
					<div class="bg-gray-300">
						<iframe  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2427.7010711346697!2d6.082102415697082!3d52.52074867981436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7df34b9a32335%3A0xaabbb8d575d9fccb!2sDeltion%20College!5e0!3m2!1sen!2sus!4v1642154434084!5m2!1sen!2sus"></iframe>
					</div>
				</div>
            </div>
        </div>
    </div>
</x-app-layout>
