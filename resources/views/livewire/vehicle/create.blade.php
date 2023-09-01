<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-slate-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white dark:bg-slate-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form wire:submit.prevent="store">
                <div class="bg-white dark:bg-slate-700 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="name" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Name</label>
                            <input type="text"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="name" placeholder="Enter Name" wire:model.lazy="name">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="owner" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Owner:</label>
                            <input type="text"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="owner" placeholder="Owner Name" wire:model.lazy="owner">
                            @error('owner') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Model:</label>
                            <input
                                type="text"
                                class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                id="model" wire:model.lazy="model" placeholder="Model">
                            @error('model') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="vehicle_number" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Vehicle Number:</label>
                            <input
                                type="text"
                                class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                id="vehicle_number" wire:model.lazy="vehicle_number" placeholder="Vehicle Number">
                            @error('vehicle_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="passenger_seats_available" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Available passenger seats:</label>
                            <input
                                type="text"
                                class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                id="passenger_seats_available" wire:model.lazy="passenger_seats_available" placeholder="Available passenger seats">
                            @error('passenger_seats_available') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="place_id" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Tourist attraction:</label>
                            <select name="place_id" id="place_id" wire:model.lazy="place_id" class="form-control">
                                <option value="" selected disabled>Select a place</option>
                                @foreach($places as $place)
                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                @endforeach
                            </select>
                            @error('place_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Image URL:</label>
                            <x-filepond wire:model="img_url" name="image"/>
                            @error('img_url') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-slate-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Store
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 dark:text-slate-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
