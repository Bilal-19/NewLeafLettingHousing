@extends('TenantLayout.main')

@push('style')
    <style>
        body {
            background-color: #f5f5f5
        }

        .carousel-img {
            height: 500px;
            width: 1000px;
            object-fit: cover;
            border-radius: 12px;
        }

        .property-detail-card {
            height: 129px;
            width: 443px;
            background-color: #F0F0F0;
            border-radius: 24px;
            padding: 26px 24px;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 30px;
        }

        .property-features-card {
            border-radius: 24px;
            background-color: #F0F0F0;
            padding: 26px 24px;
            margin-left: 30px;
            margin-bottom: 20px;
        }

        .property-booking {
            border-radius: 5px;
            background-color: #EDEDED;
            padding: 32px 35px;
            margin-top: 40px;
        }

        .property-booking input,
        .property-booking select {
            padding: 22px 28px;
            margin-bottom: 10px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }

        @media only screen and (max-width: 768px) {
            .property-detail-card {
                /* padding: 20px 12px; */
                margin-right: 10px;
                width: 300px;
            }

            .carousel-img {
                height: 300px;
                width: 300px;
                margin: auto;
                display: block;
            }

            .property-features-card {
                width: 300px;
            }

            .property-booking {
                width: 90%;
            }
        }
    </style>
@endpush

@php
    $propertyFeatures = $findProperty->property_features;
    $featuredArray = explode(',', $propertyFeatures);
@endphp

@section('main-section')
    <div class="row d-flex justify-content-center align-items-center mb-5">
        <div class="col-md-9 mx-auto">
            <!-- Carousel -->
            <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Loop through your images -->
                    @foreach ($fetchPropertyImages as $index => $value)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($value) }}" alt="" class="img-fluid carousel-img">
                        </div>
                    @endforeach
                </div>

                <!-- Pagination (if needed) -->
                <div class="carousel-indicators">
                    @foreach ($fetchPropertyImages as $index => $value)
                        <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>

            <!-- Left Arrow -->
            <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                <img src="{{ asset('images/leftArrow.png') }}" alt="">
            </button>
            <!-- Right Arrow -->
            <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                <img src="{{ asset('images/rightArrow.png') }}" alt="">
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 mx-auto text-center">
            <h4 class="fw-semibold fs-40 fs-sm-28 text-forest-green">{{ $findProperty->property_name }}</h4>
            <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->property_address }}</p>
            <p class="fs-24 fs-sm-18 fw-regular">
                {{ $findProperty->property_description }}
            </p>
            <p class="fw-medium fs-28 fs-sm-18 d-flex justify-content-around">
                <span>Bedrooms: {{ $findProperty->bedrooms }}</span>
                <span>Bathrooms: {{ $findProperty->bathrooms }}</span>
                <span>Receptions: {{ $findProperty->reception }}</span>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-11 col-md-11 bg-white mx-auto">
            <div class="row mt-5">
                <div class="col-md-4 property-detail-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Address:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->property_address }}</p>
                </div>

                <div class="col-md-4 property-detail-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Price:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->monthly_rent }}$</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 property-detail-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Property Type:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->property_type }}</p>
                </div>

                <div class="col-md-4 property-detail-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Status:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">
                        @if ($findProperty->property_status == 'Available')
                            Available for Rent
                        @else
                            Booked
                        @endif
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 property-features-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Features:</h6>
                    <ul class="fs-24 fs-sm-18 fw-regular">
                        @foreach ($featuredArray as $el)
                            <li>{{ $el }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-11 col-md-11 bg-white rounded mx-auto mt-5 mb-5 p-5">
            <h4 class="fw-semibold fs-40 text-forest-green fs-sm-28">Comments</h4>
            <p>Would you like to share your valuable feedback? If so, please click
                <a href="" class="text-forest-green text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">here.</a>
            </p>

            @foreach ($fetchComments as $comment)
                <p>{{$comment->tenant_message}} ~ {{$comment->tenant_name}}, {{$comment->tenant_country}}</p>
            @endforeach

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $findProperty->property_name }} - Feedback
                                Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Submit.Feedback', ['id' => $findProperty->id]) }}" method="post"
                                autocomplete="off">
                                @csrf
                                <div class="mt-3">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter your Full Name">
                                </div>

                                <div class="mt-3">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter your Email">
                                </div>

                                <div class="mt-3">
                                    <input type="text" name="country" class="form-control"
                                        placeholder="Enter your Country Name">
                                </div>

                                <div class="mt-3">
                                    <textarea name="message" rows="5" class="form-control" placeholder="Write your message here"
                                        style="resize:none;"></textarea>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-success w-100">Submit Feedback</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto property-booking">
            <h4 class="fw-semibold fs-40 fs-sm-28 text-forest-green">Property Booking</h4>
            <form action="" autocomplete="off" class="mt-5">
                <div>
                    <input type="text" name="fullName" class="form-control" placeholder="Enter your full Name">
                </div>

                <div>
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email">
                </div>

                <div>
                    <input type="text" name="phoneNumber" class="form-control" placeholder="Enter your Phone Number">
                </div>

                <div>
                    <input type="text" name="address" class="form-control" placeholder="Enter your Address">
                </div>

                <div>
                    <select name="adults" class="form-select">
                        <option>Select No of Adults</option>
                        @for ($i = 1; $i <= 8; $i++)
                            <option value={{ $i }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div>
                    <select name="childrens" class="form-select">
                        <option>Select No of Childrens</option>
                        @for ($i = 1; $i <= 4; $i++)
                            <option value={{ $i }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>


                <div>
                    <select name="childrens" class="form-select">
                        <option>Select Total Months to Stay</option>
                        @for ($i = 1; $i <= 4; $i++)
                            <option value={{ $i }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div>
                    <input type="text" name="accountTitle" class="form-control"
                        placeholder="Enter your Account Title">
                </div>

                <div>
                    <input type="number" name="cardNumber" class="form-control" placeholder="Enter your Card Number">
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <input type="number" name="cvc" class="form-control" placeholder="Ex. 123">
                    </div>

                    <div>
                        <input type="number" name="cvc" class="form-control" placeholder="Exp Month">
                    </div>

                    <div>
                        <input type="number" name="cvc" class="form-control" placeholder="Exp Year">
                    </div>
                </div>

                <div>
                    <button class="btn btn-success w-100">Confirm Booking</button>
                </div>
            </form>
        </div>
    </div>
@endsection
