<div>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Travel guides</h1>
                        <p class="text-white">Explore a wide range of travel guides for your next adventure.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">

        <x-wireui-modal.card title="Book guide - {{ $guide_name }}" blur wire:model.defer="isModalVisible">
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
            <x-wireui-input wire:model.live="search" placeholder="Search guides" class="bg-blue-100 text-blue-600 rounded-md border-2 border-blue-300 px-4 py-2"/>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            @if (count($guides) > 0)
                @foreach($guides as $guide)
                    <div class="col-span-1">
                        <div class="media-1 bg-white rounded-lg shadow-lg p-4">
                            <div class="mt-4">
                                <h3 class="text-xl font-semibold mb-0">{{$guide->name}}</h3>
                                <h4 class="text-gray-600 dark:text-white mt-2">Rs.{{ number_format($guide->payment, 2) }}</h4>
                                <p class="text-gray-800 dark:text-white mt-2">Known Language: {{$guide->known_languages}}</p>
                                <p class="text-gray-800 dark:text-white mt-2">Gender: {{$guide->gender}}</p>
                                <p class="text-gray-800 dark:text-white mt-2">Address: {{$guide->address}}</p>
                                <p class="text-gray-800 dark:text-white mt-2">Experienced Years: {{$guide->experience_years}}</p>
                            </div>
                            <div class="flex justify-center mt-4 gap-4">
                                <x-wireui-button rounded positive label="Book" wire:click="showModal({{$guide->id}})"/>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-4 text-center">
                    <p class="text-gray-500 dark:text-gray-400 text-center py-4">No travel guides added yet.</p>
                </div>
            @endif
        </div>
        <div class="mt-8">
            {{ $guides->links('landing-page.partials.pagination') }}
        </div>
    </div>
</div>
