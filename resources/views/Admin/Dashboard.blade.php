@extends('AdminLayout.DashboardTemplate')
@push('style')
    <style>
        .count-card {
            background-color: #118d51;
            color: white;
            padding: 10px;
            border-radius: 6px;
            height: fit-content;
            text-align: center;
            margin: 10px;
            /* width: fit-content; */
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Admin <span class="text-forest-green">Dashboard</span></h3>
        </div>

        <div class="row">
            <p>Welcome <span class="text-forest-green">{{ Auth::user()->name }}</span></p>
        </div>

        <div class="row">
            <div class="col-md-2 count-card">
                <p>10+ Properties</p>
            </div>

            <div class="col-md-2 count-card">
                <p>10+ Active Bookings</p>
            </div>

            <div class="col-md-2 count-card">
                <p>10+ Partners</p>
            </div>

            <div class="col-md-2 count-card">
                <p>2+ Offered Services</p>
            </div>

            <div class="col-md-2 count-card">
                <p>2+ Team Members</p>
            </div>
        </div>
    </div>
@endsection
