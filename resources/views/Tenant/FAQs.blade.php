@extends('TenantLayout.main')

@section('main-section')
    <div class="row" id="landlord-bg-image">
        <div class="col-md-8 p-5">
            <h3 class="fs-44 fw-semibold text-dark-charcoal fs-sm-28">
                Your Questions Answered
            </h3>
            <p class="fs-24 text-dark-gray fs-sm-18">
                Have questions? We've got answers! Here are some of the most commonly asked questions to help you understand
                how we work and what we offer. If you still have queries, don’t hesitate to contact us!
            </p>
            <p class="text-dark fs-20 fs-sm-18">
                Frequently Asked Questions
                <img src="{{ asset('images/downArrow.png') }}" alt="">
            </p>
        </div>
    </div>

    <div class="row text-center mt-5">
        <h4 class="fs-44 fs-sm-28 fw-semibold">
            Questions and Answers
        </h4>
    </div>

    {{-- Fetch FAQs from Database --}}


    <div class="row text-center mt-5">
        <div class="col-md-11 mx-auto">
            <h4 class="fs-44 fs-sm-28 fw-semibold">
                Have More Questions?
            </h4>
            <p class="fs-20 fs-sm-18 text-dark-gray">
                Reach out to our team at <span class="text-forest-green fw-semibold">info@newleaflettings.com</span> or call
                us directly at <span class="text-forest-green fw-semibold">+44 123 456 7890</span>. We're here to help!
            </p>
        </div>
    </div>
@endsection
