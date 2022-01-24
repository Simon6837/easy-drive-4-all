<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                @include('pages.dashboards.components.studentCard')
                @include('pages.dashboards.components.instructorCard')
                @include('pages.dashboards.components.carCard')
                @include('pages.dashboards.components.notificationCard')
                @include('pages.dashboards.components.laratrustCard')
                @include('pages.dashboards.components.ownerAbsenceCard')
                @include('pages.dashboards.components.textCard')
            </div>
        </div>
    </section>
</x-app-layout>
