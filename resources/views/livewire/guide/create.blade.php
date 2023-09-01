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
                            <label for="gender" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Gender</label>
                            <select wire:model="gender">
                                <option>Please select a gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="known_languages" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Known Languages:</label>
                            <input type="text"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="known_languages" placeholder="Known Languages" wire:model.lazy="known_languages">
                            @error('known_languages') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="experience_years" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Experience Years:</label>
                            <input type="number"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="experience_years" placeholder="Experience Years" wire:model.lazy="experience_years">
                            @error('experience_years') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="contact_no" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Contact Number:</label>
                            <input type="tel"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="contact_no" placeholder="Contact Number" wire:model.lazy="contact_no">
                            @error('contact_no') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Address:</label>
                            <input type="text"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="address" placeholder="Address" wire:model.lazy="address">
                            @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="payment" class="block text-slate-700 dark:text-white text-sm font-bold mb-2">Payment:</label>
                            <input type="number"
                                   class="shadow dark:bg-slate-800 appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
                                   id="payment" placeholder="Payment" wire:model.lazy="payment">
                            @error('payment') <span class="text-red-500">{{ $message }}</span>@enderror
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
