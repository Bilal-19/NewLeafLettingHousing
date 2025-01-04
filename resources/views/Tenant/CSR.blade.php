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
                Learn More <img src="{{ asset('images/downArrow.png') }}"
                alt="">
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
        <div class="col-md-3 partnership-card">
            <h4 class="fw-semibold fs-32 fs-sm-25">Homes for Change</h4>
            <p class="fs-24 fs-sm-18">
                Together, we provide pathways to secure housing for those in need.
            </p>
        </div>

        <div class="col-md-3 partnership-card">
            <h4 class="fw-semibold fs-32 fs-sm-25">Change Ahead</h4>
            <p class="fs-24 fs-sm-18">
                Our collaboration enables us to leverage resources and expertise for greater impact.
            </p>
        </div>

        <div class="col-md-3 partnership-card">
            <h4 class="fw-semibold fs-32 fs-sm-25">Includability</h4>
            <p class="fs-24 fs-sm-18">
                We work closely to ensure inclusivity and accessibility in all aspects of our work.
            </p>
        </div>

        <div class="col-md-3 partnership-card">
            <h4 class="fw-semibold fs-32 fs-sm-25">BVSC</h4>
            <p class="fs-24 fs-sm-18">
                Partnering with the Birmingham Voluntary Service Council, we align our mission with local community needs
            </p>
        </div>

        <div class="col-md-3 partnership-card">
            <h4 class="fw-semibold fs-32 fs-sm-25">SEA Forum</h4>
            <p class="fs-24 fs-sm-18">
                Engaging with social enterprise leaders to drive innovative housing solutions.
            </p>
        </div>

        <div class="col-md-3 partnership-card">
            <h4 class="fw-semibold fs-32 fs-sm-25">Energy Partner</h4>
            <p class="fs-24 fs-sm-18">
                Partnering with a sustainable energy provider to enhance energy efficiency and reduce environmental impact
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <h3 class="fw-semibold fs-44 fs-sm-28 text-center">Impact Stories</h3>
    </div>

    <div class="row mt-5 d-flex justify-content-around">
        <div class="col-md-4 story-card">
            <img src="{{ asset('images/bright_future.png') }}" alt="" class="img-fluid">
            <h4 class="fw-semibold fs-34 fs-sm-25 text-dark-charcoal mt-4 mb-2">A Brighter Future for the Johnson Family</h4>
            <p class="fs-24 fs-sm-18 text-dark-gray">Facing housing instability, the Johnson family found security and peace
                of mind through Green Key's Guaranteed
                Rent program. With stable housing, their children could thrive in school, and they could focus on building a
                better future</p>
        </div>

        <div class="col-md-4 story-card">
            <img src="{{ asset('images/thompson_family.png') }}" alt="" class="img-fluid">
            <h4 class="fw-semibold fs-34 fs-sm-25 text-dark-charcoal mt-4 mb-2">
                A Fresh Start for the Thompson Family
            </h4>
            <p class="fs-24 fs-sm-18 text-dark-gray">
                Struggling with housing uncertainty, the Thompson family gained stability and relief through Green Key’s
                Guaranteed Rent program. With a secure home, their children excelled in school, and they could finally focus
                on creating a brighter, more promising future.
            </p>
        </div>
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
                    <div class="swiper-slide p-5">
                        <img src="{{ asset('images/startComma.png') }}" alt="">
                        <p class="text-center">Green Key has been a game-changer. I get guaranteed rent, and they handle
                            everything. Plus, it
                            feels great knowing I'm helping families</p>
                        <p class="user-profile">
                            <img src="{{ asset('images/male.png') }}" alt="">
                            <span class="fs-20 fs-sm-18"><span class="fw-semibold">John</span>, Birmingham</span>
                        </p>
                    </div>

                    <div class="swiper-slide p-5">
                        <img src="{{ asset('images/startComma.png') }}" alt="">
                        <p class="text-center">
                            I used to struggle with property management, but Green Key took that burden away. It's
                            amazing to have guaranteed income without the hassle.
                        </p>
                        <p class="user-profile">
                            <img src="{{ asset('images/male.png') }}" alt="">
                            <span class="fs-20 fs-sm-18"><span class="fw-semibold">Jennifer</span>, Lopez</span>
                        </p>
                    </div>

                    <div class="swiper-slide p-5">
                        <img src="{{ asset('images/startComma.png') }}" alt="">
                        <p class="text-center">
                            HomeCare Solutions has transformed the way I manage my properties. Their service is
                            efficient, and I feel secure knowing my tenants are well.
                        </p>
                        <p class="user-profile">
                            <img src="{{ asset('images/male.png') }}" alt="">
                            <span class="fs-20 fs-sm-18"><span class="fw-semibold">Alex</span>, London</span>
                        </p>
                    </div>

                    <div class="swiper-slide p-5">
                        <img src="{{ asset('images/startComma.png') }}" alt="">
                        <p class="text-center">
                            I used to struggle with property management, but Green Key took that burden away. It's
                            amazing to have guaranteed income without the hassle.
                        </p>
                        <p class="user-profile">
                            <img src="{{ asset('images/male.png') }}" alt="">
                            <span class="fs-20 fs-sm-18"><span class="fw-semibold">Jennifer</span>, Lopez</span>
                        </p>
                    </div>

                    <div class="swiper-slide p-5">
                        <img src="{{ asset('images/startComma.png') }}" alt="">
                        <p class="text-center">Green Key has been a game-changer. I get guaranteed rent, and they
                            handle
                            everything. Plus, it
                            feels great knowing I'm helping families</p>
                        <p class="user-profile">
                            <img src="{{ asset('images/male.png') }}" alt="">
                            <span class="fs-20 fs-sm-18"><span class="fw-semibold">John</span>, Birmingham</span>
                        </p>
                    </div>

                    <div class="swiper-slide p-5">
                        <img src="{{ asset('images/startComma.png') }}" alt="">
                        <p class="text-center">
                            I used to struggle with property management, but Green Key took that burden away. It's
                            amazing to have guaranteed income without the hassle.
                        </p>
                        <p class="user-profile">
                            <img src="{{ asset('images/male.png') }}" alt="">
                            <span class="fs-20 fs-sm-18"><span class="fw-semibold">Jennifer</span>, Lopez</span>
                        </p>
                    </div>


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
