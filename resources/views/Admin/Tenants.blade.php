@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Tenants List</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Tenant Name</th>
                        <th>Property Name</th>
                        <th>Property Owner</th>
                        <th>Property Rent</th>
                        <th>Lease Start Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($fetchBookingRecords as $record)
                        <tr>
                            <td>{{ $record->full_name }}</td>
                            <td>{{ $record->property_name }}</td>
                            <td>{{ $record->name }}</td>
                            <td>${{ $record->monthly_rent }}</td>
                            <td>{{ $record->booking_date }}</td>
                            <td>{{ $record->property_status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
