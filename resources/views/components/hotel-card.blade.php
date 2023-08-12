<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{ $src }}" alt="place image"/>
    </a>
    <div class="px-5 pb-5">
        <a href="{{$link}}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $name }}</h5>
            <p>
            <span>
                <i class="fi fi-rr-marker"></i>
            </span>
                {{$place}}
            </p>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            @for ($i = 0; $i < $count; $i++)
                <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            @endfor

            @for ($i = 5; $i > $count; $i--)
                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            @endfor
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $count }}</span>
        </div>
                <div class="mb-0">
                    <span class="mr-1 font-size-14 text-gray-1">From</span>
                    <span class="font-weight-bold">$300</span>
                    <span class="font-size-14 text-gray-1">/night</span>
                </div>

    </div>
</div>

{{--<div class="card transition-3d-hover shadow-hover-2 mt-2 item-loop ">--}}
{{--    <div class="position-relative">--}}
{{--        <a href="https://mytravel.bookingcore.co/hotel/hotel-stanford" class="d-block gradient-overlay-half-bg-gradient-v5">--}}
{{--            <img class="img-responsive card-img-top lazy loaded" data-src="https://mytravel.bookingcore.co/uploads/mytravel/space/space-5.jpg" alt="Hotel Stanford" src="https://mytravel.bookingcore.co/uploads/mytravel/space/space-5.jpg" data-was-processed="true">--}}
{{--        </a>--}}
{{--        <div class="position-absolute top-0 right-0 pt-3 pr-3">--}}
{{--            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">--}}
{{--                <span class="service-wishlist " data-id="1" data-type="hotel">--}}
{{--                    <span class="flaticon-heart-1 font-size-20"></span>--}}
{{--                </span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="position-absolute bottom-0 left-0 right-0">--}}
{{--            <div class="px-4 pb-3">--}}
{{--                <a href="https://mytravel.bookingcore.co/hotel/hotel-stanford" class="d-block">--}}
{{--                    <div class="d-flex align-items-center font-size-14 text-white">--}}
{{--                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> Arrondissement de Paris--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="card-body px-4 pt-2 pb-3">--}}
{{--        <div class="mb-2 hotel-star">--}}
{{--            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">--}}
{{--                <div class="green-lighter">--}}
{{--                    <small class="fa fa-star"></small>--}}
{{--                    <small class="fa fa-star"></small>--}}
{{--                    <small class="fa fa-star"></small>--}}
{{--                    <small class="fa fa-star"></small>--}}
{{--                    <small class="fa fa-star"></small>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <a href="https://mytravel.bookingcore.co/hotel/hotel-stanford" class="card-title font-size-17 font-weight-medium text-dark">Hotel Stanford</a>--}}
{{--        <div class="mt-2 mb-3">--}}
{{--            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.3/5</span>--}}
{{--            <span class="font-size-14 text-gray-1 ml-2">(--}}
{{--                                                    3 reviews--}}
{{--                         )--}}
{{--                    </span>--}}
{{--        </div>--}}
{{--        <div class="mb-0">--}}
{{--            <span class="mr-1 font-size-14 text-gray-1">From</span>--}}
{{--            <span class="font-weight-bold">$300</span>--}}
{{--            <span class="font-size-14 text-gray-1">/night</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
