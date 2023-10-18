<x-slot name="header">
    <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white">Manage Bookings</h2>
</x-slot>
<div class="py-12 px-4">
    <div class="mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 px-2">
                <div class="relative">
                    <x-wireui-input wire:model.live="search" placeholder="Search bookings"/>
                </div>
            </div>
            @if(count($bookings) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Booked At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Booking Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            End Date
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th class="px-6 py-4">
                                {{$loop->iteration}}
                            </th>
                            <td class="px-6 py-4">
                                {{ $booking->created_at->format('Y M d \a\t h:i A') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $booking->vehicle->name ?? $booking->guide->name}}
                                , {{$booking->vehicle->owner->name ?? ''}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $booking->start_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $booking->end_date }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No bookings found.</p>
            @endif
        </div>
    </div>
</div>
