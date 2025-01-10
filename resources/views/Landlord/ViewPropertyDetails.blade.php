@extends('LandlordLayout.LandlordDashboard')
@push('style')
    <style>
        .fa-solid {
            height: 15px;
            width: 15px;
        }

        .tick-marker {
            list-style: none;
        }

        .tick-marker::before {
            content: "✓";
            margin-right: 10px;
            color: green;
        }
    </style>
@endpush
@section('main-section')
    @php
        $propertyFeatures = $findProperty->property_features;
        $featuredArray = explode(',', $propertyFeatures);
    @endphp
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">View <span class="text-forest-green">Property</span></h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-9 mx-auto">
                <img src="{{ asset('Properties/Thumbnail/' . $findProperty->property_thumbnail) }}" alt=""
                    class="img-fluid">
                <h4>{{ $findProperty->property_name }}</h4>
                <p class="mb-0"><i class="fa-solid fa-location-dot"></i> {{ $findProperty->property_address }}</p>
                <p class="mb-0"><i class="fa-solid fa-dollar-sign"></i> {{ $findProperty->monthly_rent }}</p>
                <p class="mb-0"><b>Status</b>: {{ $findProperty->property_status }}</p>
                <p class="mb-0"><b>Property Features</b>:</p>
                <ul>
                    @foreach ($featuredArray as $val)
                        <li class="tick-marker">{{ $val }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
