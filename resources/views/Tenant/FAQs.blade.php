@extends('TenantLayout.main')

@push('style')
    <style>
        body {
            background-color: #F5F5F5;
        }

        .accordion-item {
            background-color: #FFFFFF;
        }

        /* Remove the default background and text color on click */
        .accordion-button:not(.collapsed) {
            background-color: inherit !important;
            color: inherit !important;
            box-shadow: none !important;
        }

        /* Customize the accordion button background and text color */
        .accordion-button:not(.collapsed):hover {
            background-color: #f8f9fa !important;
            /* Light background color */
            color: #212529 !important;
            /* Dark text color */
        }

        /* Optional: Customize the border color when active */
        .accordion-button {
            border-color: #ddd !important;
        }
    </style>
@endpush

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
                <img src="{{ asset('images/downArrow.png') }}" alt="down arrow">
            </p>
        </div>
    </div>

    <div class="row text-center mt-5">
        <h4 class="fs-44 fs-sm-28 fw-semibold">
            Questions and Answers
        </h4>
    </div>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="accordion" id="accordionExample">
                @foreach ($fetchFAQs as $record)
                    <div class="accordion-item mt-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $record->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $record->id }}">
                                {{ $record->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $record->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    {!! $record->answer !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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
