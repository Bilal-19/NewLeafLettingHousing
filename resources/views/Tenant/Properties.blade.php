@extends('TenantLayout.main')

@push('style')
    <style>
        body {
            background-color: #f5f5f5
        }

        .property-thumbnail{
            height: 400px;
            width: 400px;
            object-fit: cover;
        }
    </style>
@endpush

@section('main-section')
    <div class="row" id="about-bg-image">
        <div class="col-md-12 p-5">
            <h3 class="fs-44 text-center fw-semibold text-dark-charcoal fs-sm-28">
                Your next property is just a click away.
            </h3>
        </div>

        <div class="col-md-6 mx-auto">
            <form action="{{ route('Properties') }}" method="get" autocomplete="off">
                <div class="input-group">
                    <input type="search" name="search" class="form-control"
                        placeholder="Search properties by location, price range, size, or amenities.." value="{{old('search')}}">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-md-11 mx-auto">
            @foreach ($fetchAvailableProperties as $record)
                <div class="row mb-5 available-property-card shadow">
                    <div class="col-md-4">
                        <img src="{{ asset('Properties/Thumbnail/' . $record->property_thumbnail) }}" alt=""
                            class="img-fluid property-thumbnail">
                    </div>
                    <div class="col-md-6">
                        <h4 class="fs-40 text-forest-green fw-semibold fs-sm-28">{{ $record->property_name }}</h4>
                        <p class="fw-regular fs-24 fs-sm-18">{{ Str::limit($record->property_description, 200) }}</p>
                        <p class="fw-medium fs-24 fs-sm-18 d-flex justify-content-between">
                            <span>Bedrooms: {{ $record->bedrooms }}</span>
                            <span>Bathrooms: {{ $record->bathrooms }}</span>
                            <span>Receptions: {{ $record->reception }}</span>
                        </p>
                        <a href="{{route('View.Detail.Property', ['id' => $record->id])}}" class="btn btn-success">View Property</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
