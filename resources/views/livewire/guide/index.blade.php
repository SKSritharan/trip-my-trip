<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white">Manage Tourist Guides</h2>
</x-slot>

<div class="py-12 px-4">
    <x-wireui-modal.card title="Add a Tourist Guide" blur wire:model.defer="isModalOpen">
        @if($user_role !== 'guide')
            <div class="grid grid-cols-1 gap-10 mb-6">
                <x-wireui-select label="User" wire:model="user_id" placeholder="Select the user">
                    @foreach($users as $user)
                        <x-wireui-select.user-option :value="$user->id" :src="empty($user->profile_photo_path) ? 'https://cdn-icons-png.flaticon.com/512/3177/3177440.png' : $user->profile_photo_path" :label="$user->name"/>
                    @endforeach
                </x-wireui-select>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
            <x-wireui-input label="Name" placeholder="Name" wire:model="name"/>
            <x-wireui-native-select
                wire:model="gender" label="Gender"
                placeholder="Select a gender"
                :options="['Male', 'Female', 'Other']"
            />
        </div>
        <div class="grid grid-cols-1 gap-10 mb-6">
            <x-wireui-textarea label="Known Languages" placeholder="Known Languages" wire:model="known_languages"/>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
            <x-wireui-input label="Contact Number" type="tel" placeholder="Contact Number" wire:model="contact_no"/>
            <x-wireui-inputs.number label="Experience Years" type="number" placeholder="Experience Years" wire:model="experience_years"/>
        </div>
        <div class="grid grid-cols-1 gap-10 mb-6">
            <x-wireui-textarea label="Address" placeholder="Address" wire:model="address"/>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-6">
            <x-wireui-input class="pr-28" label="Payment" placeholder="Payment" suffix=".00" wire:model="payment"/>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end">
                <x-wireui-button flat label="Cancel" x-on:click="close"/>
                <x-wireui-button primary label="Store" wire:click="store"/>
            </div>
        </x-slot>
    </x-wireui-modal.card>

    <div class="mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 px-2">
                <div>
                    <x-wireui-button primary label="Add a Tourist Guide" wire:click="create"/>
                </div>
                <div class="relative">
                    <x-wireui-input wire:model.live="search" placeholder="Search guides"/>
                </div>
            </div>
            @if(count($guides) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-20">No.</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Gender</th>
                        <th scope="col" class="px-6 py-3">Known Languages</th>
                        <th scope="col" class="px-6 py-3">Experience Years</th>
                        <th scope="col" class="px-6 py-3">Contact Number</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Payment</th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guides as $guide)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $guide->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $guide->gender }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $guide->known_languages }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $guide->experience_years }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $guide->contact_no }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $guide->address }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $guide->payment }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-between">
                                    <x-wireui-button class="ml-4" secondary label="Edit" wire:click="edit({{ $guide->id }})"/>
                                    <x-wireui-button class="ml-4" negative label="Delete" wire:click="deleteConfirm({{ $guide->id }})"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $guides->links('layouts.pagination') }}
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No tourist guides found.</p>
            @endif
        </div>
    </div>
</div>
