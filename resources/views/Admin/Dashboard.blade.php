@extends('AdminLayout.DashboardTemplate')
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
            border-bottom: 1px solid #888888;
            border-left: 1px solid #888888;
            border-right: 1px solid #888888;
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
                <i class="fa-solid fa-lg fa-building"></i>
                <p>{{ $totalProperties }} Properties</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-calendar-check"></i>
                <p>{{ $totalBookings }} Active Bookings</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-handshake"></i>
                <p>{{ $totalPartners }} Partners</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-briefcase"></i>
                <p>{{ $totalServices }} Offered Services</p>
            </div>

            <div class="col-md-2 count-card">
                <i class="fa-solid fa-lg fa-users"></i>
                <p>{{ $totalMembers }} Team Members</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        const xValues = ["Rented Properties", "Available Properties"];
        const yValues = [
            {{$totalRentedProperties}},
            {{$totalAvailableProperties}},
        ];
        const barColors = [
            "#b91d47",
            "#00aba9",
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Available Vs Rented Properties"
                }
            }
        });
    </script>
@endpush
