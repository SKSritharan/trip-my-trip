<x-master-layout>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Places</h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia
                            and Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                @foreach($places as $place)
                    <div class="col-6 col-md-6 col-lg-3">
                        <div class="media-1">
                            <a href="#" class="d-block mb-3">
                                <img src="{{asset('storage/'.$place->img_url)}}" alt="Image" class="img-fluid">
                            </a>
                            <div class="d-flex">
                                <div>
                                    <h3><a href="#">{{$place->name}}</a></h3>
                                    <p>{{$place->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $places->links('landing-page.partials.pagination') }}
            </div>
        </div>
    </div>

    {{--    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">--}}
    {{--        <div class="text-center mb-4">--}}
    {{--                    <span class="font-medium dark:text-white">--}}
    {{--        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Explore Amazing Places</h2>--}}
    {{--        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Discover and plan your adventures with our user-friendly platform. We're here to help you make the most of your travels.</p>--}}
    {{--    </span>--}}
    {{--        </div>--}}
    {{--        <div class="grid lg:grid-cols-12 gap-4">--}}
    {{--            <div class="col-span-3">--}}
    {{--                <x-google-map class="rounded-lg shadow"--}}
    {{--                              :centerPoint="['lat' => 7.8731, 'long' => 80.7718]"--}}
    {{--                              :zoomLevel="7"--}}
    {{--                              :markers="$markers"--}}
    {{--                />--}}
    {{--            </div>--}}
    {{--            <div class="lg:col-span-9">--}}
    {{--                <div class="grid lg:grid-cols-4 gap-4">--}}
    {{--                    @foreach($places as $place)--}}
    {{--                        <x-place-card--}}
    {{--                            src="{{asset('storage/'.$place->img_url)}}"--}}
    {{--                            name="{{$place->name}}"--}}
    {{--                            description="{{$place->description}}"--}}
    {{--                            count="2"--}}
    {{--                            link="#"--}}
    {{--                        />--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--                <div class="mt-4">--}}
    {{--                    {{ $places->links() }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-master-layout>
