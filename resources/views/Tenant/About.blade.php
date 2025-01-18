@extends('TenantLayout.main')

@section('main-section')
    <div class="row" id="about-bg-image">
        <div class="col-md-8 p-5">
            <h3 class="fs-44 fw-semibold text-dark-charcoal fs-sm-28">Turning Properties into Opportunities</h3>
            <p class="fs-24 text-dark-gray fs-sm-18">
                Green Key Housing bridges the gap between landlords seeking secure income and families in need of stable,
                supportive homes.
            </p>
            <a href="#mission-and-story" class="text-dark fs-20 fs-sm-18 text-decoration-none">
                Learn More About US
                <img src="{{ asset('images/downArrow.png') }}" alt="down arrow icon">
            </a>
        </div>
    </div>

    <div class="row bg-offwhite d-flex justify-content-around align-items-center pt-5" id="mission-and-story">
        <div class="col-md-4">
            <img src="{{ asset('images/mission.png') }}" alt="Mission & Story" class="img-fluid">
        </div>
        <div class="col-md-7">
            <h3 class="fs-44 fs-sm-28 fw-semibold text-dark-charcoal">Our Mission and Story</h3>
            <p class="fs-24 fs-sm-18 text-dark-gray">
                At <b>Green Key Housing,</b> we believe in turning properties into opportunities. Our mission is to provide
                landlords with secure and reliable income while creating safe and stable homes for families in need. With
                every property, we're making a difference."
            </p>
            <div class="row company-history">
                <div class="col-md-7">
                    <p>
                        Founded on integrity, social responsibility, and excellence, we’re here to redefine what property
                        management can achieve."
                    </p>
                </div>
                <div class="col-md-5">
                    <button class="btn-style">Discover Our Services</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <h3 class="text-center fw-semibold fs-44 fs-sm-28">What Drives Us</h3>
    </div>

    <div class="row d-flex justify-content-around align-items-center">
        <div class="col-md-3 mission-card shadow">
            <img src="{{ asset('images/Integrity.png') }}" alt="Integrity" class="img-fluid">
            <h4 class="fw-semibold fs-32 fs-sm-25 mt-3">Integrity</h4>
            <p class="fs-24 fs-sm-18">
                We're committed to transparency and trust in every relationship.
            </p>
        </div>

        <div class="col-md-3 mission-card shadow">
            <img src="{{ asset('images/social.png') }}" alt="social responsiblity" class="img-fluid">
            <h4 class="fw-semibold fs-32 fs-sm-25 mt-3">Social Responsibility</h4>
            <p class="fs-24 fs-sm-18">
                We use property as a force for good, supporting those who need it most.
            </p>
        </div>

        <div class="col-md-3 mission-card shadow">
            <img src="{{ asset('images/excellence.png') }}" alt="excellence" class="img-fluid">
            <h4 class="fw-semibold fs-32 fs-sm-25 mt-3">Excellence</h4>
            <p class="fs-24 fs-sm-18">
                From tenant support to property management, we deliver outstanding results.
            </p>
        </div>
    </div>

    <div class="row bg-offwhite mt-5 pt-5 pb-5 d-flex justify-content-around align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('images/team.png') }}" alt="Team" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h4 class="fs-44 fs-sm-28 fw-semibold">Our Story</h4>
            <p class="fs-24 fs-sm-18">
                Green Key Housing was founded with a simple idea: to bridge the gap between landlords seeking stress-free
                property management and families in need of housing solutions. Over the years, we’ve built a reputation for
                reliability, professionalism, and meaningful impact.
            </p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-9 mx-auto text-center">
            <h4 class="fw-semibold fs-44 fs-sm-28 text-dark-charcoal">Meet the Team</h4>
            <p class="text-dark-gray fs-24 fs-sm-18">Get to Know Us</p>
            <p class="fs-24 fs-sm-18 text-dark-gray">
                We're a team of dedicated professionals passionate about creating solutions that work for landlords and
                families
                alike. With expertise in property management, tenant support, and community building, we're here to deliver
                excellence at every step.
            </p>
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center">
        @foreach ($fetchTeamMembersRec as $record)
            <div class="col-md-3 team-member-card shadow">
                <img src="{{ asset('Team/' . $record->profile_picture) }}" alt="{{ $record->name }}"
                    class="d-block mx-auto img-fluid">
                <h5 class="fw-semibold fs-32 fs-sm-25 text-dark-charcoal mt-3 mb-0">{{ $record->name }}</h5>
                <p class="fs-20 fs-sm-18 text-forest-green mt-0">{{ $record->position }}</p>
                <p class="fs-20 fs-sm-18 text-dark-gray mx-auto">{{ $record->description }}</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ $record->linkedin_profile }}">
                        <img src="{{ asset('images/linkedin.png') }}" alt="linkedin icon">
                    </a>
                    <a href="{{ $record->facebook_profile }}">
                        <img src="{{ asset('images/facebook.png') }}" alt="facebook icon">
                    </a>
                    <a href="{{ $record->instagram_profile }}">
                        <img src="{{ asset('images/instagram.png') }}" alt="instagram icon">
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row text-center mb-5 mt-3">
        <p class="text-dark">
            Learn more about our services or get in touch to start making an impact with your property today
        </p>
        <a href="{{route('Contact')}}" class="btn-style text-decoration-none d-block mx-auto">Contact Us</a>
    </div>
@endsection

