<div class="p-4 md:w-1/4 sm:w-1/2 w-full">
    <a href="{{route('notifications')}}">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
            <i class="text-indigo-600 fa-3x fas fa-comment-alt"></i>
            <h2 class="title-font font-medium text-3xl text-gray-900">{{$data['notificationCount']}}
                @role('owner')
                actief
                @endrole
            </h2>
            <p class="leading-relaxed">Meldingen</p>
        </div>
    </a>
</div>
