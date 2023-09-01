<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white">Manage Places</h2>
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
                Create Place
            </button>
            @if($isModalOpen)
                @include('livewire.place.create')
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                    <tr class="bg-gray-600 dark:text-white text-gray-800">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Latitude</th>
                        <th class="px-4 py-2">Longitude</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($places as $place)
                        <tr class="dark:text-white text-gray-700">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $place->name }}</td>
                            <td class="border px-4 py-2">{{ $place->description}}</td>
                            <td class="border px-4 py-2">{{ $place->lat}}</td>
                            <td class="border px-4 py-2">{{ $place->long}}</td>
                            <td class="border px-4 py-2"><img src="{{asset('storage/'.$place->img_url)}}"></td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $place->id }})"
                                        class="flex px-4 py-2 bg-gray-600 text-white cursor-pointer">Edit
                                </button>
                                <button wire:click="delete({{ $place->id }})"
                                        class="flex px-4 py-2 bg-red-100 text-gray-800 cursor-pointer">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $places->links() }}
            </div>
        </div>
    </div>
</div>
