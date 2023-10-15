<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white">Manage Places</h2>
</x-slot>
<div class="py-12 px-4">
    <x-wireui-modal.card title="Add a Place" blur wire:model.defer="isModalOpen">
        @if($img_url)
            <div class="text-center">
                <img class="h-auto max-w-lg mx-auto rounded-lg" src="{{asset($img_url)}}" alt="place image">
            </div>
        @endif
        <div class="grid grid-cols-1 gap-10 mb-6">
            <x-wireui-input label="Name" placeholder="Place Name" wire:model="name"/>
        </div>
        <div class="grid grid-cols-1 gap-10 mb-6">
            <x-wireui-textarea label="Description" placeholder="Place Description" wire:model="description"/>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
            <x-wireui-input label="Latitude" placeholder="Place Latitude" wire:model="lat"/>
            <x-wireui-input label="Longitude" placeholder="Place Longitude" wire:model="long"/>
        </div>
        <div class="w-full mb-6">
            <x-filepond label="Image" wire:model="img_url"/>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-wireui-button flat label="Cancel" x-on:click="close"/>
                <x-wireui-button primary label="Save" wire:click="store"/>
            </div>
        </x-slot>
    </x-wireui-modal.card>

    <div class="mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 px-2">
                <div>
                    <x-wireui-button primary label="Add a Place" wire:click='create'/>
                </div>
                <div class="relative">
                    <x-wireui-input wire:model.live="search" placeholder="Search places"/>
                </div>
            </div>
            @if(count($places) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Latitude
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Longitude
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($places as $place)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-lg" src="{{asset($place->img_url)}}"
                                     alt="Place image">
                            </th>
                            <td class="px-6 py-4">
                                {{ $place->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $place->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $place->lat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $place->long }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-between">
                                    <x-wireui-button class="ml-4" secondary label="Edit"
                                                     wire:click="edit({{ $place->id }})"/>
                                    <x-wireui-button class="ml-4" negative label="Delete"
                                                     wire:click="deleteConfirm({{ $place->id }})"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $places->links('layouts.pagination') }}
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No places found.</p>
            @endif
        </div>
    </div>
</div>
