<x-app-layout>
    <div class="w-full bg-gray-100">
        <div class="container max-w-5xl mx-auto mb-6">
            <div>
                <picture>
                    <img class="w-full max-h-96" src="assets/about-us/main.webp" alt="about-us-image">
                </picture>
            </div>
            <div class="mt-8">
                <section class="mb-12 px-6 py-16 bg-white shadow rounded-lg">
                    @foreach($data as $item)
                        @if($item['position'] == 1) <h1 class="text-3xl mb-4">{{$item['title']}}</h1>
                        <p>
                            {{$item['text']}}
                        </p>
                        @endif
                    @endforeach
                </section>
                <section class="mb-12 px-6 py-16 bg-white shadow rounded-lg">
                    <h1 class="text-3xl">Waarom ons?</h1>
                    <div>
                        <ul class="list-none">
                            <li>
                                <div class="flex flex-col lg:flex-row">
                                    <div class="lg:basis-5/12 mt-6">
                                        <div class="flex flex-row">
                                            <div class="md:basis-2/12">
                                                <div class="">
                                                    <div
                                                        class="text-center flex justify-center items-center m-auto border-2 rounded-full border-indigo-600 w-20 h-20">
                                                        <i class="text-indigo-600 fas fa-user fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md:basis-10/12 pl-2">
                                                @foreach($data as $item)
                                                    @if($item['position'] == 2)
                                                        <h3 class="text-2xl">{{$item['title']}}</h3>
                                                        <p>
                                                            {{$item['text']}}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:basis-1/12"></div>
                                    <div class="lg:basis-5/12 mt-6">
                                        <div class="flex flex-row">
                                            <div class="md:basis-2/12">
                                                <div class="">
                                                    <div
                                                        class="text-center flex justify-center items-center m-auto border-2 rounded-full border-indigo-600 w-20 h-20">
                                                        <i class="text-indigo-600 fas fa-clock fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md:basis-10/12 pl-2">
                                                @foreach($data as $item)
                                                    @if($item['position'] == 3)
                                                        <h3 class="text-2xl">{{$item['title']}}</h3>
                                                        <p>
                                                            {{$item['text']}}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col lg:flex-row">
                                    <div class="lg:basis-5/12 mt-6">
                                        <div class="flex flex-row">
                                            <div class="md:basis-2/12">
                                                <div class="">
                                                    <div
                                                        class="text-center flex justify-center items-center m-auto border-2 rounded-full border-indigo-600 w-20 h-20">
                                                        <i class="text-indigo-600 fas fa-calendar-alt fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md:basis-10/12 pl-2">
                                                @foreach($data as $item)
                                                    @if($item['position'] == 4)
                                                        <h3 class="text-2xl">{{$item['title']}}</h3>
                                                        <p>
                                                            {{$item['text']}}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:basis-1/12"></div>
                                    <div class="lg:basis-5/12 mt-6">
                                        <div class="flex flex-row">
                                            <div class="md:basis-2/12">
                                                <div class="">
                                                    <div
                                                        class="text-center flex justify-center items-center m-auto border-2 rounded-full border-indigo-600 w-20 h-20">
                                                        <i class="text-indigo-600 fas fa-thumbs-up fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md:basis-10/12 pl-2">
                                                @foreach($data as $item)
                                                    @if($item['position'] == 5)
                                                        <h3 class="text-2xl">{{$item['title']}}</h3>
                                                        <p>
                                                            {{$item['text']}}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <section class="mb-12 px-6 py-16 bg-white shadow rounded-lg">
                    @foreach($data as $item)
                        @if($item['position'] == 6)
                    <h1 class="text-3xl mb-4">{{$item['title']}}</h1>
                    <div class="flex flex-col lg:flex-row">
                        <div class="lg:basis-6/12">
                            <picture>
                                <source srcset="assets/about-us/lesson-car.jpg">
                                <source srcset="assets/about-us/lesson-car.png">
                                <img class="w-full h-full object-cover pr-4" src="assets/about-us/lesson-car.webp"
                                     alt="les-auto">
                            </picture>
                        </div>
                        <div class="lg:basis-6/12">{{$item['text']}}
                        </div>
                        @endif
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
        <div class="container h-24 mb-4"></div>
    </div>
</x-app-layout>
