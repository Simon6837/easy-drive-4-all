<div class="p-4 md:w-1/4 sm:w-1/2 w-full">
    <a href="{{route('profile')}}">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
            <i class="text-indigo-600 fa-3x fas fa-user"></i>
            <div class="lg:w-32 lg:max-w-32 xl:w-60 xl:max-w-60 mx-auto text-center">
                <h2 class="title-font font-medium text-3xl text-gray-900 text-ellipsis overflow-hidden">
                    {{ Auth::user()->first_name }}
                </h2>
            </div>
            <p class="leading-relaxed">Mijn gegevens bekijken</p>
        </div>
    </a>
</div>
