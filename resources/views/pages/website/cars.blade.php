<x-app-layout>
    <div class="w-full bg-gray-100">
        <div class="container max-w-5xl mx-auto mb-6 mt-8">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($cars as $car)
                <!-- start item -->
                <div class="mb-8 bg-white shadow rounded-lg">
                    <div class="rounded-t-lg w-full h-40 relative overflow-hidden">
                        @if(!$car->image)
                            <img class="absolute h-40 w-full object-cover"
                                 src="assets/placeholders/RallyCar.jpg" alt="no image found">
                        @else
                        <img class="absolute h-40 w-full object-cover" src="/assets/images/cars/{{ $car->image }}" alt="{{ $car->image }}">
                        @endif
                    </div>
                    <div class="px-4 py-8">
                        <h2 class="text-lg font-semibold">{{$car->model}}</h2>
                        <ul class="list-none">
                            <li>
                                <div class="grid md:grid-cols-2">
                                    <p>Merk:</p>
                                    <p class="mb-4 md:mb-0 md:text-right break-word">{{$car->brand}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="grid md:grid-cols-2">
                                    <p>Type:</p>
                                    <p class="mb-4 md:mb-0 md:text-right break-word">{{$car->type}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="grid md:grid-cols-2">
                                    <p>Kenteken:</p>
                                    <p class="mb-4 md:mb-0 md:text-right break-word">{{$car->license_plate}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end item -->
                @endforeach
            </div>
        </div>
        <div class="container h-24 mb-4"></div>
    </div>
</x-app-layout>
