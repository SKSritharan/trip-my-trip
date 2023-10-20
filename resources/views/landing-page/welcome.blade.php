<x-master-layout>
    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="intro-wrap">
                        <h1 class="mb-5">
                            <span class="d-block">Let's Enjoy Your</span> Trip In <span class="typed-words"></span>
                        </h1>
                        <div class="row">
                            <div class="col-12">
                                <form class="form">
                                    <div class="row mb-2">
                                        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                            <select name="" id="" class="form-control custom-select">
                                                @foreach($places as $place)
                                                    <option value="">{{$place->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-5">
                                            <input type="text" class="form-control" name="daterange">
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-3">
                                            <input type="text" class="form-control" placeholder="# of People">
                                        </div>

                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                            <input type="submit" class="btn btn-primary btn-block" value="Search">
                                        </div>
                                        <div class="col-lg-8">
                                            <label class="control control--checkbox mt-3">
                                                <span class="caption">Save this search</span>
                                                <input type="checkbox" checked="checked"/>
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="slides">
                        <img src="{{asset('landing-page/images/hero-slider-1.png')}}" alt="Image"
                             class="img-fluid active">
                        <img src="{{asset('landing-page/images/hero-slider-2.png')}}" alt="Image"
                             class="img-fluid">
                        <img src="{{asset('landing-page/images/hero-slider-3.png')}}" alt="Image"
                             class="img-fluid">
                        <img src="{{asset('landing-page/images/hero-slider-4.png')}}" alt="Image"
                             class="img-fluid">
                        <img src="{{asset('landing-page/images/hero-slider-5.png')}}" alt="Image"
                             class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="section-title text-center mb-3">Our Services</h2>
                    <p>Discover the best travel experience with Trip My Trip. Let us take you on a journey of a lifetime.</p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-4 order-lg-1">
                    <div class="h-100">
                        <div class="frame h-100">
                            <div class="feature-img-bg h-100"
                                 style="background-image: url('{{asset('./landing-page/images/hero-slider-1.png')}}');"></div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-plane display-4 text-primary"></span>
                            <h3>Exotic Travel Destinations</h3>
                            <p class="mb-0">Explore the most beautiful and exotic travel destinations around the world.</p>
                        </div>
                    </div>

                    <div class="feature-1 ">
                        <div class="align-self-center">
                            <span class="flaticon-swimming display-4 text-primary"></span>
                            <h3>Luxurious Accommodations</h3>
                            <p class="mb-0">Indulge in the comfort and luxury of our handpicked hotels and resorts.</p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">
                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-playground display-4 text-primary"></span>
                            <h3>Guided Tours</h3>
                            <p class="mb-0">Enjoy guided tours and make the most out of your travel experience.</p>
                        </div>
                    </div>

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-restaurant display-4 text-primary"></span>
                            <h3>Culinary Delights</h3>
                            <p class="mb-0">Savor the flavors of local and international cuisine during your journey.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Exclusive Deals & Discounts</h2>
                    <p>Embark on a journey with Trip My Trip and enjoy exclusive deals and discounts. Explore the beauty of the world without breaking the bank.</p>
                </div>
            </div>
            <div class="row">
                @foreach($vehicles as $vehicle)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="media-1">
                            <a href="#" class="d-block mb-3"><img src="{{asset($vehicle->img_url)}}"
                                                                  alt="Image" class="img-fluid"></a>
                            <span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span>{{$vehicle->model}}</span>
						</span>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h3><a href="#">{{$vehicle->name}}</a></h3>
                                    <div class="price ml-auto">
                                        <span>Rs. {{$vehicle->amount}}</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7"><h2 class="section-title text-center">Popular Destination</h2></div>
            </div>

            <div class="owl-carousel owl-3-slider">
                @foreach($places as $place)
                    <div class="item">
                        <a class="media-thumb" href="{{asset($place->img_url)}}"
                           data-fancybox="gallery">
                            <div class="media-text">
                                <h3>{{$place->name}}</h3>
                            </div>
                            <img src="{{asset($place->img_url)}}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col-lg-6">
                    <figure class="img-play-video">
                        <img src="{{asset('./landing-page/images/hero-slider-4.png')}}" alt="Image" class="img-fluid rounded-20">
                    </figure>
                </div>

                <div class="col-lg-5">
                    <h2 class="section-title text-left mb-4">Explore the World with Trip My Trip</h2>
                    <p>Discover breathtaking destinations and unforgettable experiences with Trip My Trip. Let us guide you on a journey that will leave you with unforgettable memories.</p>

                    <p class="mb-4">Immerse yourself in the wonders of nature and culture, where every moment is an adventure. Experience the beauty of the world and create unforgettable memories along the way.</p>

                    <ul class="list-unstyled two-col clearfix">
                        <li>Exciting Adventure Tours</li>
                        <li>Flight Bookings</li>
                        <li>Car Rentals</li>
                        <li>Cruise Vacations</li>
                        <li>Comfortable Hotels</li>
                        <li>Train Journeys</li>
                        <li>Travel Insurance</li>
                        <li>Customized Travel Packages</li>
                        <li>Secure Travel Insurance</li>
                        <li>Expert Travel Guides</li>
                    </ul>

                    <p><a href="#" class="btn btn-primary">Plan Your Journey</a></p>


                </div>
            </div>
        </div>
    </div>

    <div class="py-5 cta-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2 text-white">Explore the World with Trip My Trip</h2>
                    <p class="mb-4 lead text-white text-white-opacity">Embark on a journey of a lifetime with Trip My Trip. Let us guide you through an adventure that you will cherish forever.</p>
                    <p class="mb-0"><a href="{{ route('contact-us') }}" class="btn btn-outline-white text-white btn-md font-weight-bold">Contact Us</a></p>
                </div>
            </div>
        </div>
    </div>

</x-master-layout>
