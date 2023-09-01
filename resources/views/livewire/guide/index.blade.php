<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white">Manage Tourist Guides</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()"
                    class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base font-bold text-white shadow-sm hover:bg-blue-700">
                Add a Tourist Guide
            </button>
            @if($isModalOpen)
                @include('livewire.guide.create')
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                    <tr class="bg-gray-600 dark:text-white text-gray-800">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Known Languages</th>
                        <th class="px-4 py-2">Experience Years</th>
                        <th class="px-4 py-2">Contact Number</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Payment</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guides as $guide)
                        <tr class="dark:text-white text-gray-700">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $guide->name }}</td>
                            <td class="border px-4 py-2">{{ $guide->gender }}</td>
                            <td class="border px-4 py-2">{{ $guide->known_languages }}</td>
                            <td class="border px-4 py-2">{{ $guide->experience_years }}</td>
                            <td class="border px-4 py-2">{{ $guide->contact_no }}</td>
                            <td class="border px-4 py-2">{{ $guide->address }}</td>
                            <td class="border px-4 py-2">{{ $guide->payment }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $guide->id }})"
                                        class="flex px-4 py-2 bg-gray-600 text-white cursor-pointer">Edit
                                </button>
                                <button wire:click="delete({{ $guide->id }})"
                                        class="flex px-4 py-2 bg-red-100 text-gray-800 cursor-pointer">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $guides->links() }}
            </div>
        </div>
    </div>
</div>