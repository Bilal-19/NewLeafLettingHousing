@extends('TenantLayout.main')

@push('style')
    <style>
        body {
            background-color: #f5f5f5;
        }

        iframe {
            border-radius: 8px;
            height: 258px;
            width: 494px;
        }

        input,
        textarea {
            padding: 22px 28px;
            border-radius: 12px;
            width: 80%;
            border: none;
            display: block;
        }

        input:focus,
        textarea:focus {
            outline: none;
        }

        textarea {
            resize: none;
        }

        .submit-btn {
            background-color: #118D51;
            color: white;
            border-radius: 26px;
            padding: 9px 18px;
            width: 80%;
            border: none;
        }

        @media only screen and (max-width: 768px) {
            iframe {
                width: 100%;
            }

            form input,
            form textarea,
            form button {
                width: 98%;
                display: block;
                margin: 10px auto;
            }
        }
    </style>
@endpush

@section('main-section')
    <div class="row mt-5">
        <div class="col-md-11 mx-auto text-center">
            <h3 class="fs-44 fs-sm-28 fw-semibold">Contact Us</h3>
            <p class="fs-20 fs-sm-18 text-dark-gray">
                Reach out to our team at <span class="text-forest-green fw-semibold">info@newleaflettings.com</span> or call
                us directly at <span class="text-forest-green fw-semibold">+44 123 456 7890</span>. We're here to help!
            </p>
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center">
        <div class="col-md-5" id="contact-us-card">
            <h4 class="fs-32 fs-sm-25 fw-semibold pt-3">Contact Us</h4>

            <div class="d-flex">
                <div>
                    <img src="{{ asset('images/phone_sm.png') }}" alt="" class="img-fluid">
                </div>
                <div class="mx-2">
                    <h6 class="mb-0 fs-20 fs-sm-18 fw-semibold text-dark-charcoal">Phone</h6>
                    <p class="text-mid-gray fs-18 fs-sm-16">+44 123 456 7890</p>
                </div>
            </div>

            <div class="d-flex">
                <div>
                    <img src="{{ asset('images/email_sm.png') }}" alt="">
                </div>
                <div class="mx-2">
                    <h6 class="mb-0 fs-20 fs-sm-18 fw-semibold text-dark-charcoal">Email</h6>
                    <p class="text-mid-gray fs-18 fs-sm-16">info@newleaflettings.com</p>
                </div>
            </div>

            <div class="d-flex">
                <div>
                    <img src="{{ asset('images/location_sm.png') }}" alt="">
                </div>
                <div class="mx-2">
                    <h6 class="mb-0 fs-20 fs-sm-18 fw-semibold text-dark-charcoal">Location</h6>
                    <p class="text-mid-gray fs-18 fs-sm-16">123 New Leaf Street, City Name, Postcode, Country</p>
                </div>
            </div>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9582217.994172787!2d-15.017900641550694!3d54.10195860209009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2s!4v1735908513405!5m2!1sen!2s"
                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        <div class="col-md-5">
            <form action="{{ route('Submit.Inquiry') }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <input type="text" name="fullName" placeholder="Enter your Full Name">
                    <small class="text-danger">
                        @error('fullName')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" placeholder="Enter your Email">
                    <small class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="mb-3">
                    <input type="number" name="phoneNumber" placeholder="Enter your Phone Number">
                    <small class="text-danger">
                        @error('phoneNumber')
                            {{ $message }}
                        @enderror
                    </small>
                </div>


                <div class="mb-3">
                    <textarea name="message" cols="30" rows="5" placeholder="Enter your message"></textarea>
                    <small class="text-danger">
                        @error('message')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div>
                    <button class="submit-btn">Send Message</button>
                </div>
            </form>
        </div>
    </div>
@endsection
