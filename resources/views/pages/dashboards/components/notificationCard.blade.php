<div class="p-4 md:w-1/4 sm:w-1/2 w-full">
    <a href="{{route('notifications')}}">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
            <svg class="text-indigo-500 w-12 h-12 inline-block" className="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{2}"
                      d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">{{$data['notificationCount']}}
                @role('owner')
                actief
                @endrole
            </h2>
            <p class="leading-relaxed">Meldingen</p>
        </div>
    </a>
</div>
<div class="p-4 md:w-1/4 sm:w-1/2 w-full">
    <a href="{{route('lessonindex')}}">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
            <svg class="text-indigo-500 w-12 h-12 inline-block" className="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{2}"
                      d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">{{$data['lessonsCount']}}
                @role('instructor')
                actief
                @endrole
            </h2>
            <p class="leading-relaxed">Lessen</p>
        </div>
    </a>
</div>