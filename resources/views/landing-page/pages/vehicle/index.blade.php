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
                @if ($vehicles->isEmpty())
                    <div class="col-12 text-center">
                        <p>No travel vehicles added yet.</p>
                    </div>
                @else
                    @foreach($vehicles as $vehicle)
                        <x-vehicle-card
                            :image="$vehicle->img_url"
                            :name="$vehicle->name"
                            :description="$vehicle->description"
                            :amount="$vehicle->amount"
                            :payment="$vehicle->payment_type"
                            :ratings="4.2"
                        />
                    @endforeach
                @endif
            </div>
            <div class="mt-4">
                {{ $vehicles->links('landing-page.partials.pagination') }}
            </div>
        </div>
    </div>
</x-master-layout>
