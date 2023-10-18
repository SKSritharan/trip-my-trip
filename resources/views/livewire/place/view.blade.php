<div>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Explore Amazing Places</h1>
                        <p class="text-white">Embark on a journey to discover breathtaking destinations, hidden gems,
                            and diverse cultures from around the world. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container mx-auto p-4">
            <x-wireui-modal.card title="{{$name}}" blur wire:model.defer="isPlaceVisible">
                <div class="media-1">
                    <a href="#" class="d-block mb-3">
                        <img src="{{asset($img_url)}}" alt="Image" class="img-fluid">
                    </a>
                    <div class="d-flex">
                        <div>
                            <p>{{$description}}</p>
                        </div>
                    </div>
                    <div class="w-full h-96 flex justify-center">
                        <iframe
                            width="600"
                            height="450"
                            style="border:0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed/v1/place?key={{config('app.google_map_key')}}&q={{$lat}},{{$long}}&zoom=15">
                        </iframe>
                    </div>
                </div>
            </x-wireui-modal.card>
            <div class="mb-5">
                <x-wireui-input wire:model.live="search" placeholder="Search Places" class="bg-blue-100 text-blue-600 rounded-md border-2 border-blue-300 px-4 py-2"/>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                @if(count($places) > 0)
                    @foreach($places as $place)
                        <div class="col-span-1">
                            <div class="media-1 rounded-lg shadow-lg p-4">
                                <a href="#" class="d-block mb-3">
                                    <img src="{{asset($place->img_url)}}" alt="Image" class="w-full h-44 object-cover rounded-t-lg">
                                </a>
                                <div class="mt-4">
                                    <h3 class="text-xl font-semibold">{{$place->name}}</h3>
                                    <p class="text-gray-800 dark:text-white mt-2">{{$place->description}}</p>
                                </div>
                                <div class="flex justify-center mt-4">
                                    <x-wireui-button rounded primary label="View" wire:click="showPlace({{$place->id}})"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex justify-center w-full mt-8">
                        <p class="text-gray-500 dark:text-gray-400 text-center py-4">No places found.</p>
                    </div>
                @endif
            </div>
            <div class="mt-8">
                {{ $places->links('landing-page.partials.pagination') }}
            </div>
        </div>
    </div>
</div>
