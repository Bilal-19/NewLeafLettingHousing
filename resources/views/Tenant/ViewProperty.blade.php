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
            margin-right: 20px;
        }

        @media only screen and (max-width: 768px) {
            .property-detail-card {
                /* padding: 20px 12px; */
                margin-right: 10px;
                width: 300px;
            }
        }
    </style>
@endpush

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
            <div class="row mt-5 mx-3">
                <div class="col-md-4 property-detail-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Address:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->property_address }}</p>
                </div>

                <div class="col-md-4 property-detail-card mx-2">
                    <h6 class="fs-24 fw-medium fs-sm-18">Price:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->monthly_rent }}$</p>
                </div>
            </div>

            <div class="row mx-3">
                <div class="col-md-4 property-detail-card">
                    <h6 class="fs-24 fw-medium fs-sm-18">Property Type:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->property_address }}</p>
                </div>

                <div class="col-md-4 property-detail-card mx-2">
                    <h6 class="fs-24 fw-medium fs-sm-18">Status:</h6>
                    <p class="fs-24 fs-sm-18 fw-regular">{{ $findProperty->property_status }}</p>
                </div>
            </div>


        </div>
    </div>
@endsection
