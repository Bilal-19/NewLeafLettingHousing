@extends('TenantLayout.main')

@push('style')
    <style>
        body {
            background-color: #f5f5f5;
        }
    </style>
@endpush

@section('main-section')
    <div class="row" id="landlord-bg-image">
        <div class="col-md-8 p-5">
            <h3 class="fs-44 fw-semibold text-dark-charcoal fs-sm-28">
                Maximize Your Property's Potential with Green Key Housing
            </h3>
            <p class="fs-24 text-dark-gray fs-sm-18">
                Guaranteed Rent. Expert Management. Real Impact.
            </p>
            <a class="text-dark fs-20 fs-sm-18 text-decoration-none" href="{{route("Landlord.Dashboard")}}">
                Partner with Us Today <img src="{{ asset('images/downArrow.png') }}" alt="down arrow">
            </a>
        </div>
    </div>

    <div class="row mt-5 d-flex justify-content-around align-items-center">
        <div class="col-md-5">
            <img src="{{ asset('images/agreement.png') }}" alt="Agreement between Landlord and Tenant" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h4 class="fs-32 fs-sm-25 fw-semibold text-dark pt-5">Why Landlords Choose Green Key?</h4>
            <p class="fs-24 fs-sm-18 text-dark-gray mt-4">
                Partner with us to secure reliable income, eliminate the hassle of property management, and make a
                difference in the lives of families in need. Whether you're a landlord, developer, or property owner, we're
                here to provide tailored solutions that work for you
            </p>
            <p class="fs-20 fs-sm-18 text-dark">See How It Works <img src="{{ asset('images/downArrow.png') }}"
                    alt="down arrow"></p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 mx-auto text-center">
            <h3 class="fs-32 fs-sm-25 text-dark">The Green Key Journey</h3>
            <p class="fs-18 fs-sm-16 text-dark-gray">
                From humble beginnings to trusted housing partners, creating impact every step of the way.
            </p>
        </div>
    </div>

    <div class="row d-flex justify-content-around mb-5">
        <div class="col-md-3 landlord-card">
            <img src="{{ asset('images/contact.png') }}" alt="contact icon">
            <h4 class="fs-32 fs-sm-25 fw-semibold">Contact Us</h4>
            <p class="text-dark-gray fs-24 fs-sm-18">
                Tell us about your property and your goals
            </p>
        </div>

        <div class="col-md-3 landlord-card">
            <img src="{{ asset('images/consultation.png') }}" alt="Free Consultation">
            <h4 class="fs-32 fs-sm-25 fw-semibold">Free Consultation</h4>
            <p class="text-dark-gray fs-24 fs-sm-18">
                We assess your property and provide a tailored plan
            </p>
        </div>

        <div class="col-md-3 landlord-card">
            <img src="{{ asset('images/leaseAgreement.png') }}" alt="Lease Agreement">
            <h4 class="fs-32 fs-sm-25 fw-semibold">Agreement</h4>
            <p class="text-dark-gray fs-24 fs-sm-18">
                Sign a lease agreement with guaranteed rent terms
            </p>
        </div>

        <div class="col-md-3 landlord-card">
            <img src="{{ asset('images/stressFree.png') }}" alt="Stress-Free Letting">
            <h4 class="fs-32 fs-sm-25 fw-semibold">Stress-Free Letting</h4>
            <p class="text-dark-gray fs-24 fs-sm-18">
                We handle tenant placement, management, and compliance
            </p>
        </div>
    </div>

    <div class="row bg-white pt-5">
        <h4 class="fs-44 fs-sm-28 fw-semibold text-center">Why Partner With Us?</h4>

        <div class="row cta-partner-cards mt-5">
            <div class="col-md-3 cta-card shadow">
                <img src="{{ asset('images/money.png') }}" alt="Guaranteed Rent" class="img-fluid">
                <p class="mt-5 fs-14 ff-source-code-pro">01.</p>
                <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Guaranteed Rent</h5>
                <hr class="border border-secondary w-75">
                <p class="fs-18 fs-sm-16">
                    Receive consistent payments every month, with no void periods.
                </p>
            </div>

            <div class="col-md-3 cta-card shadow">
                <img src="{{ asset('images/professionalManagement.png') }}" alt="Professional Management" class="img-fluid">
                <p class="mt-5 fs-14 ff-source-code-pro">02.</p>
                <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Professional Management</h5>
                <hr class="border border-secondary w-75">
                <p class="fs-18">
                    Our team takes care of everything from tenant sourcing to property maintenance.
                </p>
            </div>

            <div class="col-md-3 cta-card shadow">
                <img src="{{ asset('images/support.png') }}" alt="Social Impact" class="img-fluid">
                <p class="mt-5 fs-14 ff-source-code-pro">03.</p>
                <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Social Impact</h5>
                <hr class="border border-secondary w-75">
                <p class="fs-18">
                    Your property helps provide stable housing for families in need.
                </p>
            </div>

            <div class="col-md-3 cta-card shadow">
                <img src="{{ asset('images/flexibility.png') }}" alt="Flexibility" class="img-fluid">
                <p class="mt-5 fs-14 ff-source-code-pro">04.</p>
                <h5 class="text-forest-green fw-semibold fs-24 fs-sm-18">Flexibility</h5>
                <hr class="border border-secondary w-75">
                <p class="fs-18">
                    We work with landlords, developers, and property owners to create solutions tailored to your needs.
                </p>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-md-6 mx-auto text-center">
                <p>Ready to make a difference with your property?</p>
                <a href="" class="btn-style text-decoration-none">Contact Us Today</a>
            </div>
        </div>
    </div>

    <div class="row" id="landlord-footer-bg">
        <div class="col-md-10 mx-auto text-center mt-5 mb-5">
            <h3 class="fs-44 fs-sm-28 fw-semibold">What We're Looking For?</h3>
            <p class="fs-24 fs-sm-18">
                At Green Key Housing, we believe every property has the potential to make a difference. Whether you have a
                commercial building ready for conversion, a block of flats, or are a developer with new units, we want to
                hear from you. While our minimum requirement is 5-unit blocks, we are open to exploring all opportunities
                that can be transformed into quality social housing. Let's work together to make a lasting impact.
            </p>
        </div>
    </div>
@endsection
