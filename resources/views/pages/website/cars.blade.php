<x-app-layout>
    <div class="w-full bg-gray-100">
        <div class="container max-w-5xl mx-auto mb-6 mt-8">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($cars as $car)
                <!-- start item -->
                <div class="mb-8 bg-white shadow rounded-lg">
                    <div class="rounded-t-lg w-full h-40 relative overflow-hidden">
                        <img class="absolute h-40 w-full object-cover" src="/assets/images/cars/{{ $car->image }}" alt="{{ $car->image }}">
                    </div>
                    <div class="px-4 py-8">
                        <h2 class="text-lg font-semibold">{{$car->model}}</h2>
                        <ul class="list-none">
                            <li>
                                <div class="grid grid-cols-2">
                                    <p>Merk:</p>
                                    <p class="text-right">{{$car->brand}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="grid grid-cols-2">
                                    <p>Type:</p>
                                    <p class="text-right">{{$car->type}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="grid grid-cols-2">
                                    <p>Kenteken:</p>
                                    <p class="text-right">{{$car->license_plate}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end item -->
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
