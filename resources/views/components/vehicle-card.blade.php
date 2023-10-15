<div class="col-6 col-md-6 col-lg-3">
    <div class="media-1">
        <a href="#" class="d-block mb-3">
            <img src="{{ asset($img_url) }}" alt="Image" class="img-fluid">
        </a>
        <div class="d-flex">
            <div>
                <h3><a href="#">{{ $name }}</a></h3>
                <h4>Rs.{{ number_format($amount, 2) }} <br>({{$payment_type}})</h4>
                <p>{{ $description }}</p>
                <x-rating-bar-show :rating="$ratings"/>
            </div>
        </div>
    </div>
</div>
