<div>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Travel Vehicles</h1>
                        <p class="text-white">Explore a wide range of travel vehicles for your next adventure.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <x-wireui-modal.card title="View Vehicle" blur wire:model.defer="isVehicleVisible">
            <div class="media-1">
                <a href="#" class="d-block mb-3">
                    <img src="{{asset($img_url)}}" alt="Image" class="img-fluid">
                </a>
                <div class="d-flex">
                    <div>
                        <p>{{$description}}</p>
                        <p>Owner: {{$owner_name}}</p>
                        <p>Model: {{$model}}</p>
                        <p>Available Seats: {{$passenger_seats_available}}</p>
                        <p>Payment Type: {{$payment_type}}</p>
                        <p>Amount: Rs.{{ number_format($amount, 2) }}</p>
                        <p>Pickup Point: {{$pickup_point}}</p>
                    </div>
                </div>
            </div>
        </x-wireui-modal.card>

        <x-wireui-modal.card title="Book Vehicle - {{ $name }}" blur wire:model.defer="isBookingModalVisible">
            <form>
                <div class="space-y-4">
                    <x-wireui-datetime-picker without-time="true" label="Start Date" wire:model.defer="start_date" placeholder="Enter the start date"/>
                    <x-wireui-datetime-picker without-time="true" label="End Date" wire:model.defer="end_date" placeholder="Enter the end date"/>
                </div>

                <div class="mt-4 flex justify-end items-center">
                    <x-wireui-button label="Cancel" wire:click="closeModal"/>
                    <x-wireui-button class="ml-4" label="Book" primary wire:click="book"/>
                </div>
            </form>
        </x-wireui-modal.card>

        <div class="mb-5">
            <x-wireui-input wire:model.live="search" placeholder="Search Vehicles" class="bg-blue-100 text-blue-600 rounded-md border-2 border-blue-300 px-4 py-2"/>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            @if (count($vehicles) > 0)
                @foreach($vehicles as $vehicle)
                    <div class="col-span-1">
                        <div class="media-1 bg-white rounded-lg shadow-lg p-4">
                            <a href="#" class="d-block mb-3">
                                <img src="{{ asset($vehicle->img_url) }}" alt="Image"
                                     class="w-full h-44 object-cover rounded-lg">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-xl font-semibold mb-0">{{$vehicle->name}}</h3>
                                <h3 class="text-l">{{$vehicle->model}}</h3>
                                <h4 class="text-gray-600 dark:text-white mt-2">
                                    Rs.{{ number_format($vehicle->amount, 2) }} ({{$vehicle->payment_type}})</h4>
                                <p class="text-gray-800 dark:text-white mt-2">{{$vehicle->description}}</p>
                            </div>
                            <div class="flex justify-center mt-4 gap-4">
                                <x-wireui-button rounded primary label="View" wire:click="view({{$vehicle->id}})"/>
                                <x-wireui-button rounded positive label="Book" wire:click="showBooking({{$vehicle->id}})"/>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-4 text-center">
                    <p class="text-gray-500 dark:text-gray-400 text-center py-4">No travel vehicles added yet.</p>
                </div>
            @endif
        </div>
        <div class="mt-8">
            {{ $vehicles->links('landing-page.partials.pagination') }}
        </div>
    </div>
</div>
