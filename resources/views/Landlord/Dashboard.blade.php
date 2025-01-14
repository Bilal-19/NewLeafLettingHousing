@extends('LandlordLayout.LandlordDashboard')
@push('style')
    <style>
        .count-card {
            background-color: #f5f5f5;
            color: #118d51;
            padding: 10px;
            border-radius: 6px;
            height: fit-content;
            text-align: center;
            margin: 10px;
            border-top: 3px solid #118d51;
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Landlord <span class="text-forest-green">Dashboard</span></h3>
        </div>

        <div class="row">
            <h5>Welcome <span class="text-forest-green">{{ Auth::user()->name }}</span> !</h5>
        </div>

        <div class="row">
            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-building"></i>
                <p>10 Properties</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-calendar-check"></i>
                <p>2 Available Properties</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-handshake"></i>
                <p>8 Rented Properties</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-dollar"></i>
                <p>50000</p>
            </div>
        </div>
    </div>
@endsection
