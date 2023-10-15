<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white">Manage Vehicles</h2>
</x-slot>

<div class="py-12 px-4">
    <x-wireui-modal.card title="Add a Vehicle" blur wire:model.defer="isModalOpen">
        @if($img_url)
            <div class="text-center">
                <img class="h-auto max-w-lg mx-auto rounded-lg" src="{{asset($img_url)}}" alt="vehicle image">
            </div>
        @endif
        <form wire:submit.prevent="store">
            <div class="grid grid-cols-1 gap-10 mb-6">
                <x-wireui-input label="Name" placeholder="Vehicle Name" wire:model="name"/>
            </div>
            <div class="grid grid-cols-1 gap-10 mb-6">
                <x-wireui-textarea label="Description" placeholder="Vehicle Description" wire:model="description"/>
            </div>
            @if($user_role !== 'vehicle')
                <div class="grid grid-cols-1 gap-10 mb-6">
                    <x-wireui-select label="Owner" wire:model="owner_id" placeholder="Select the owner">
                        @foreach($users as $user)
                            <x-wireui-select.user-option :value="$user->id" :src="empty($user->profile_photo_path) ? 'https://cdn-icons-png.flaticon.com/512/3177/3177440.png' : $user->profile_photo_path" :label="$user->name"/>
                        @endforeach
                    </x-wireui-select>
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
                <x-wireui-input label="Model" placeholder="Vehicle Model" wire:model="model"/>
                <x-wireui-input label="Vehicle Number" placeholder="Vehicle Number" wire:model="vehicle_number"/>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
                <x-wireui-input label="Passenger Seats" placeholder="Passenger Seats" wire:model="passenger_seats_available"/>
                <x-wireui-input label="Pickup Point" placeholder="Pickup Point" wire:model="pickup_point"/>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
                <x-wireui-native-select
                    label="Payment Type" wire:model="payment_type" placeholder="Select a payment type"
                    :options="['Payment per seat', 'Payment per day']"
                />
                <x-wireui-input label="Amount" placeholder="Amount" wire:model="amount"/>
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
        </form>
    </x-wireui-modal.card>


    <div class="mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 px-2">
                <div>
                    <x-wireui-button primary label="Add a Vehicle" wire:click='create'/>
                </div>
                <div class="relative">
                    <x-wireui-input wire:model.live="search" placeholder="Search vehicles"/>
                </div>
            </div>
            @if(count($vehicles) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
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
                        @if($user_role !== 'vehicle')
                            <th scope="col" class="px-6 py-3">
                                Owner
                            </th>
                        @endif
                        <th scope="col" class="px-6 py-3">
                            Model
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Passenger Seats
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vehicle Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pickup Point
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Payment Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-lg" src="{{asset($vehicle->img_url)}}" alt="{{ $vehicle->name }} Image">
                            </th>
                            <td class="px-6 py-4">
                                {{ $vehicle->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::limit($vehicle->description, 50) }}
                            </td>
                            @if($user_role !== 'vehicle')
                                <td class="px-6 py-4">
                                    {{ $vehicle->owner->name }}
                                </td>
                            @endif
                            <td class="px-6 py-4">
                                {{ $vehicle->model }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->passenger_seats_available }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::limit($vehicle->pickup_point, 20) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->payment_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->amount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->created_at->format('Y M d \a\t h:i A') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-between">
                                    <x-wireui-button class="ml-4" secondary label="Edit"
                                                     wire:click="edit({{ $vehicle->id }})"/>
                                    <x-wireui-button class="ml-4" negative label="Delete"
                                                     wire:click="deleteConfirm({{ $vehicle->id }})"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $vehicles->links('layouts.pagination') }}
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No vehicles found.</p>
            @endif
        </div>
    </div>
</div>
