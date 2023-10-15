<x-master-layout>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Tourist Guides</h1>
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
                @if ($guides->isEmpty())
                    <div class="col-12 text-center">
                        <p>No tourist guides added yet.</p>
                    </div>
                @else
                    @foreach($guides as $guide)
                        <div class="col-6 col-md-6 col-lg-3">
                            <div class="media-1">
                                <a href="#" class="d-block mb-3">
                                    <img src="{{asset($guide->img_url)}}" alt="Image" class="img-fluid">
                                </a>
                                <div class="d-flex">
                                    <div>
                                        <h3>{{$guide->name}}</h3>
                                        <p>{{$guide->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mt-4">
                {{ $guides->links('landing-page.partials.pagination') }}
            </div>
        </div>
    </div>
</x-master-layout>
