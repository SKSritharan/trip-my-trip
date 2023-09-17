<x-master-layout>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Travel Vehicles</h1>
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
                @foreach($vehicles as $vehicle)
                    <div class="col-6 col-md-6 col-lg-3">
                        <div class="media-1">
                            <a href="#" class="d-block mb-3">
                                <img src="{{asset('storage/'.$vehicle->img_url)}}" alt="Image" class="img-fluid">
                            </a>
                            <div class="d-flex">
                                <div>
                                    <h3><a href="#">{{$vehicle->name}}</a></h3>
                                    <p>{{$vehicle->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $vehicles->links('landing-page.partials.pagination') }}
            </div>
        </div>
    </div>
</x-master-layout>
