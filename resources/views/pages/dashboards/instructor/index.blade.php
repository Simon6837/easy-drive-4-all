<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                @include('pages.dashboards.components.notificationCard')
                @include('pages.dashboards.components.instructorAbsenceCard')
                @include('pages.dashboards.components.profileCard')
                @include('pages.dashboards.components.calendarCard')
            </div>
        </div>
    </section>
</x-app-layout>
