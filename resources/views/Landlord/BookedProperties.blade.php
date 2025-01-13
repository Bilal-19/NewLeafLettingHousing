@extends('LandlordLayout.LandlordDashboard')
@php
    use Carbon\Carbon;

@endphp
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Booked <span class="text-forest-green">Properties</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Property Name</th>
                        <th>Property Address</th>
                        <th>Tenant Name</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                    </tr>
                    @foreach ($fetchAllBookedProperties as $record)
                        <tr>
                            <td>{{ $record->property_name }}</td>
                            <td>{{ $record->prop_address }}</td>
                            <td>{{ $record->full_name }}</td>
                            <td>{{ date('d M Y', strtotime($record->booking_date)) }}</td>
                            <td>{{ date('h:i:sa', strtotime($record->booking_time)) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
