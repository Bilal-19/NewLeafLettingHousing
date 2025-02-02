@extends('TenantLayout.main')

@section('main-section')
    <div class="row bg-offwhite cta">
        <div class="col-md-8">
            <h1 class="cta-tagline">
                <span class="text-forest-green">Lettings Made Simple:</span>
                <span class="text-dark-gray">Guaranteed Rent, Hassle-Free Management, </span>
                <br>
                <span class="text-golden-orange">Real Impact.</span>
            </h1>
            <p class="fs-24 fw-regular fs-sm-18">
                Empowering landlords with secure income while supporting families in need.
            </p>
            <button class="btn-style">Get Started Today</button>
            <a href="{{route("About")}}" class="mx-2 text-decoration-none fw-regular text-dark">Learn More About Us <img
                    src="{{ asset('images/up_arrow.png') }}" alt="up arrow icon"></a>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/Home.png') }}" alt="House" class="img-fluid cta-img">
        </div>
    </div>

    <div class="row mt-3">
        <h3 class="text-center fs-44 fw-semibold text-dark fs-sm-28">Why Partner with <span class="text-forest-green">
                Green Key
            </span>?</h3>
    </div>

    <div class="row cta-partner-cards mt-5">
        <div class="col-md-3 cta-card shadow">
            <img src="{{ asset('images/money.png') }}" alt="Guaranteed Rent" class="img-fluid">
            <p class="mt-5 fs-14 ff-source-code-pro">01.</p>
            <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Guaranteed Rent</h5>
            <hr class="border border-secondary w-75">
            <p class="fs-18 fs-sm-16">We ensure reliable, on-time payments, giving you complete peace of mind.</p>
        </div>

        <div class="col-md-3 cta-card shadow">
            <img src="{{ asset('images/calendar.png') }}" alt="Stress-Free Management" class="img-fluid">
            <p class="mt-5 fs-14 ff-source-code-pro">02.</p>
            <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Stress-Free Management</h5>
            <hr class="border border-secondary w-75">
            <p class="fs-18 fs-sm-16">
                From tenant sourcing to compliance and maintenance, we handle everything for you.
            </p>
        </div>

        <div class="col-md-3 cta-card shadow">
            <img src="{{ asset('images/support.png') }}" alt="Social Impact" class="img-fluid">
            <p class="mt-5 fs-14 ff-source-code-pro">03.</p>
            <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Social Impact</h5>
            <hr class="border border-secondary w-75">
            <p class="fs-18 fs-sm-16">
                Join us in creating stable, secure homes for families facing challenging circumstances.
            </p>
        </div>
    </div>

    <div class="row mt-4 mb-5">
        <p class="fs-21 text-center">Ready to make a difference with your property?</p>
        <a class="btn-style mx-auto text-decoration-none" href="{{route('Contact')}}">Contact Us Today</a>
    </div>

    <div class="row mt-5 bg-offwhite mb-5">
        <div class="col-md-12">
            <h3 class="fw-semibold fs-44 text-dark text-center mt-5 fs-sm-28">What Our <span
                    class="text-forest-green">Landlords</span> Are Saying</h3>
        </div>
        <div class="col-md-3 mx-auto">
            <h4 class="fw-bold fs-32 fs-sm-25 text-sm-center text-center">Testimonials</h4>
        </div>

        <div class="row d-flex justify-content-center align-items-center mb-5">
            <div class="col-12 col-sm-12 d-flex align-items-center flex-md-row">
                <a onclick="swiper.slidePrev()" class="pagination-arrow">
                    <img src="{{ asset('images/leftArrow.png') }}" alt="left arrow icon">
                </a>
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($fetchLandlordFeedback as $record)
                            <div class="swiper-slide p-5 slider">
                                <img src="{{ asset('images/startComma.png') }}" alt="Inverted comma start icon">
                                <p class="text-center">{{ $record->message }}</p>
                                <p class="user-profile">
                                    <img src="{{ asset('images/user.png') }}" alt="user icon" class="mx-2">
                                    <span class="fs-20 fs-sm-18"><span class="fw-semibold">{{ $record->name }}</span>,
                                        {{ $record->country }}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> --}}

                    <!-- If we need scrollbar -->
                    {{-- <div class="swiper-scrollbar"></div> --}}

                </div>
                <a onclick="swiper.slideNext()" class="pagination-arrow">
                    <img src="{{ asset('images/rightArrow.png') }}" alt="right arrow icon">
                </a>
            </div>
        </div>

        <div class="col-md-12 mb-5">
            <p class="text-center fs-18 text-dark fw-medium">Want to see how we can help you?</p>
            <a class="btn-style d-block mx-auto text-decoration-none" href="{{route("Contact")}}">Get in Touch</a>
        </div>
    </div>

    <div class="row text-center">
        <h3 class="fs-44 fw-semibold text-dark mb-0 fs-sm-28">What We Offer</h3>
        <p class="fs-24 text-dark-gray fs-sm-18">Our Services</p>
    </div>

    <div class="row d-flex justify-content-around align-items-center mb-5">
        @foreach ($fetchServices as $record)
            <div class="col-md-5 service-card shadow">
                <img src="{{ asset('Services/' . $record->icon) }}" alt="{{$record->service_name}}" class="ms-auto d-block">
                <h2 class="fs-32 fw-semibold fs-sm-25">{{ $record->service_name }}</h2>
                <p class="fs-24 mb-5 fs-sm-18">
                    {{ $record->service_description }}
                </p>
                <a href="" class="fs-20 text-dark text-decoration-none">
                    Learn More
                    <img src="{{ asset('images/up_arrow.png') }}" alt="up arrow icon">
                </a>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-4 d-flex justify-content-center align-items-center mx-auto">
            <p>Explore our full range of services</p>
            <a>
                <img src="{{ asset('images/up_right_arrow_green.png') }}" alt="right arrow icon">
            </a>
        </div>
    </div>
@endsection
