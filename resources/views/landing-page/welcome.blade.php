<x-master-layout>

    {{-- Hero --}}
    <section
        class="bg-center bg-no-repeat bg-[url('https://images.pexels.com/photos/1998438/pexels-photo-1998438.jpeg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Let's Explore Sri Lanka Together!</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Discover the best
                destinations
                and plan your next adventure with us.</p>
        </div>
    </section>

    {{-- Top Destinations --}}
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-8 mt-4">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-slate-900 dark:text-white">Top
                    Destinations</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Explore the most popular places in Sri Lanka and
                    immerse yourself in its rich culture, stunning landscapes, and vibrant cities.</p>
            </div>

            <div class="grid gap-4">
                <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
                    <!-- Image 1 -->
                    <div class="relative">
                        <img class="rounded-lg w-full h-auto"
                             src="{{asset('img/ella.jpg')}}"
                             alt="image description">
                        <div
                            class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white text-center p-4">
                            <h3 class="text-2xl font-bold mb-2">Ella</h3>
                            <p class="text-lg">200 kilometres east of Colombo and is situated at an elevation of 1,041
                                metres above sea level.</p>
                        </div>
                    </div>
                    <!-- Image 2 -->
                    <div class="relative">
                        <img class="rounded-lg w-full h-auto"
                             src="{{asset('img/trincomalee.jpg')}}"
                             alt="image description">
                        <div
                            class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white text-center p-4">
                            <h3 class="text-2xl font-bold mb-2">Trincomalee</h3>
                            <p class="text-lg">Ancient Gokanna town and port, on the island’s northeastern coast.</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 grid-cols-1 sm:grid-cols-4">
                    <!-- Image 3 -->
                    <div class="relative">
                        <img class="rounded-lg w-full h-auto"
                             src="{{asset('img/nuwara_eliya.jpg')}}"
                             alt="image description">
                        <div
                            class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white text-center p-4">
                            <h3 class="text-2xl font-bold mb-2">Nuwara Eliya</h3>
                        </div>
                    </div>
                    <!-- Image 4 -->
                    <div class="relative">
                        <img class="rounded-lg w-full h-auto"
                             src="{{asset('img/stclairs.jpg')}}"
                             alt="image description">
                        <div
                            class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white text-center p-4">
                            <h3 class="text-2xl font-bold mb-2">St. Clairs Falls</h3>
                        </div>
                    </div>
                    <!-- Image 5 -->
                    <div class="relative">
                        <img class="rounded-lg w-full h-auto"
                             src="{{asset('img/adams-peak.jpg')}}"
                             alt="image description">
                        <div
                            class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white text-center p-4">
                            <h3 class="text-2xl font-bold mb-2">Adam’s Peak</h3>
                        </div>
                    </div>
                    <!-- Image 6 -->
                    <div class="relative">
                        <img class="rounded-lg w-full h-auto"
                             src="{{asset('img/jaffna_fort.jpg')}}"
                             alt="image description">
                        <div
                            class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white text-center p-4">
                            <h3 class="text-2xl font-bold mb-2">Jaffna Fort</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4 lg:mb-16 mb-8">
                    <span class="font-medium dark:text-white">
                          <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Hotels</h2>
                          <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
                    </span>
                </div>
                <a href="#"
                   class="inline-flex items-center font-medium text-blue-600 hover:underline">
                    More
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="grid gap-4 lg:grid-cols-4">
                <x-hotel-card
                    src="https://mytravel.bookingcore.co/uploads/mytravel/hotel/gallery/hotel-gallery-1.jpg"
                    name="Hotel Lavendra"
                    count="2"
                    link="#"
                    place="Bandarawela"
                />
                <x-hotel-card
                    src="https://mytravel.bookingcore.co/uploads/mytravel/hotel/gallery/hotel-gallery-1.jpg"
                    name="name"
                    count="2"
                    link="#"
                    place="Badulla"
                />
                <x-hotel-card
                    src="https://mytravel.bookingcore.co/uploads/mytravel/hotel/gallery/hotel-gallery-1.jpg"
                    name="name"
                    count="2"
                    link="#"
                    place="Badulla"
                />
                <x-hotel-card
                    src="https://mytravel.bookingcore.co/uploads/mytravel/hotel/gallery/hotel-gallery-1.jpg"
                    name="name"
                    count="2"
                    link="#"
                    place="Badulla"
                />
            </div>
        </div>
    </section>

    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4 lg:mb-16 mb-8">
                    <span class="font-medium dark:text-white">
                          <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Places</h2>
                          <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
                    </span>
                </div>
                <a href="#"
                   class="inline-flex items-center font-medium text-blue-600 hover:underline">
                    More
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="grid gap-4 lg:grid-cols-4">
                <x-place-card
                    src="{{asset('img/jaffna_fort.jpg')}}"
                    name="name"
                    count="2"
                    link="#"
                />
                <x-place-card
                    src="{{asset('img/jaffna_fort.jpg')}}"
                    name="name"
                    count="2"
                    link="#"
                />
                <x-place-card
                    src="{{asset('img/jaffna_fort.jpg')}}"
                    name="name"
                    count="2"
                    link="#"
                />
                <x-place-card
                    src="{{asset('img/jaffna_fort.jpg')}}"
                    name="name"
                    count="2"
                    link="#"
                />
            </div>
        </div>
    </section>

    {{--    Trending Tours,--}}
    {{--    Recommended Hotels,--}}
    {{--    Feed backs--}}
    {{--    Why Choose--}}
</x-master-layout>
