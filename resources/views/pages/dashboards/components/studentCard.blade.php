<div class="p-4 md:w-1/4 sm:w-1/2 w-full">
    <a href="{{route('studentindex')}}">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
            <svg class="text-indigo-500 w-12 h-12 inline-block" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{2}" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">{{$data['studentCount']}}
            </h2>
            <p class="leading-relaxed">Studenten</p>
        </div>
    </a>
</div>
