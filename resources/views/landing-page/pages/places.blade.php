<x-master-layout>
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="text-center mb-4">
                    <span class="font-medium dark:text-white">
        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Explore Amazing Places</h2>
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Discover and plan your adventures with our user-friendly platform. We're here to help you make the most of your travels.</p>
    </span>
        </div>
        <div class="grid lg:grid-cols-12 gap-4">
            <div class="col-span-3">
                <x-google-map class="rounded-lg shadow"
                              :centerPoint="['lat' => 7.8731, 'long' => 80.7718]"
                              :zoomLevel="7"
                              :markers="$markers"
                />
            </div>
            <div class="lg:col-span-9">
                <div class="grid lg:grid-cols-4 gap-4">
                    @foreach($places as $place)
                        <x-place-card
                            src="{{asset('storage/'.$place->img_url)}}"
                            name="{{$place->name}}"
                            description="{{$place->description}}"
                            count="2"
                            link="#"
                        />
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $places->links() }}
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
