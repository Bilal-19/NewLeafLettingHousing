@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center"><span class="text-forest-green">Booked</span> Properties</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Tenant Name</th>
                        <th>Property Name</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Monthly Rents</th>
                        <th>Total Occupants</th>
                    </tr>

                    @foreach ($fetchPropertyBookings as $record)
                        <tr>
                            <td>{{ $record->full_name }}</td>
                            <td>{{ $record->property_name }}</td>
                            <td>{{ date('d-M-Y', strtotime($record->booking_date)) }}</td>
                            <td>{{ date('h:i:sa', strtotime($record->booking_time)) }}</td>
                            <td>${{ $record->monthly_rent }}</td>
                            <td>{{ $record->adults + $record->childrens }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
