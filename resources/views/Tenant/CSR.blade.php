@extends('TenantLayout.main')
@push('style')
    <style>
        body {
            background-color: #F5F5F5;
        }
    </style>
@endpush
@section('main-section')
    <div class="row" id="csr-bg-image">
        <div class="col-md-8 p-5">
            <h3 class="fs-44 fw-semibold text-dark-charcoal fs-sm-28">
                Creating Impact Beyond Housing
            </h3>
            <p class="fs-24 text-dark-gray fs-sm-18">
                At Green Key Housing, our commitment goes beyond providing housing. We actively contribute to building
                stronger communities and creating opportunities for those in need
            </p>
            <a href="" class="text-dark fs-20 fs-sm-18 text-decoration-none">
                Learn More <img src="{{ asset('images/downArrow.png') }}" alt="">
            </a>
        </div>
    </div>

    <div class="row text-center">
        <h3 class="fw-semibold fs-44 fs-sm-28">Our Initiatives</h3>
    </div>

    <div class="row mt-3">
        <div class="col-md-11 mx-auto">
            <div class="row initiative-card">
                <div class="col-md-6">
                    <img src="{{ asset('images/family.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h4 class="fs-32 fs-sm-25 fw-semibold text-dark">Supporting Families</h4>
                    <p class="fs-24 fs-sm-18 text-dark-gray">
                        Through our partnerships, we ensure families facing hardships have access to safe, secure homes
                    </p>
                </div>
            </div>
        </div>


        <div class="col-md-11 mx-auto">
            <div class="row initiative-card">
                <div class="col-md-6">
                    <h4 class="fs-32 fs-sm-25 fw-semibold text-dark">Community Engagement</h4>
                    <p class="fs-24 fs-sm-18 text-dark-gray">
                        We work closely with local organizations to drive positive change and support neighborhood
                        development.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/community.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>


        <div class="col-md-11 mx-auto">
            <div class="row initiative-card">
                <div class="col-md-6">
                    <img src="{{ asset('images/sustainable_practices.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h4 class="fs-32 fs-sm-25 fw-semibold text-dark">Sustainability Practices</h4>
                    <p class="fs-24 fs-sm-18 text-dark-gray">
                        Our operations are designed to minimize environmental impact while maximizing social benefits.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <h3 class="fw-semibold fs-44 fs-sm-28 text-center">Partnerships</h3>
    </div>

    <div class="row mt-5 d-flex justify-content-around">
        @foreach ($fetchPartnerCompanies as $record)
            <div class="col-md-3 partnership-card">
                <h4 class="fw-semibold fs-32 fs-sm-25">{{ $record->organization_name }}</h4>
                <p class="fs-24 fs-sm-18">{{ $record->organization_description }}</p>
            </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <h3 class="fw-semibold fs-44 fs-sm-28 text-center">Impact Stories</h3>
    </div>

    <div class="row mt-5 d-flex justify-content-around">
        @foreach ($fetchImpactStories as $record)
            <div class="col-md-4 story-card">
                <img src="{{ asset('Story/' . $record->thumbnail_image) }}" alt="" class="img-fluid">
                <h4 class="fw-semibold fs-34 fs-sm-25 text-dark-charcoal mt-4 mb-2">{{ $record->headline }}</h4>
                <p class="fs-24 fs-sm-18 text-dark-gray">{{ Str::limit($record->content, 100) }}</p>
            </div>
        @endforeach
    </div>



    <div class="row mx-auto mt-5 text-center">
        <h4 class="fw-bold fs-32 fs-sm-25">Testimonials</h4>
    </div>

    <div class="row mt-5 d-flex justify-content-center align-items-center mb-5">
        <div class="col-md-11 d-flex align-items-center">
            <a onclick="swiper.slidePrev()" class="pagination-arrow">
                <img src="{{ asset('images/leftArrow.png') }}" alt="">
            </a>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($fetchLandlordFeedback as $record)
                        <div class="swiper-slide p-5">
                            <img src="{{ asset('images/startComma.png') }}" alt="">
                            <p class="text-center">{{$record->message}}</p>
                            <p class="user-profile">
                                <img src="{{ asset('images/male.png') }}" alt="">
                                <span class="fs-20 fs-sm-18"><span class="fw-semibold">{{$record->name}}</span>, {{$record->country}}</span>
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
                <img src="{{ asset('images/rightArrow.png') }}" alt="">
            </a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-6 mx-auto text-center">
            <p class="fw-medium fs-18 fs-sm-16">Discover how your property can make a difference.</p>
            <button class="btn-style">Join Us Today</button>
        </div>
    </div>
@endsection
