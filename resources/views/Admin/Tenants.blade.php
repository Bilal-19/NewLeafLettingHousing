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
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Adults</th>
                        <th>Childrens</th>
                        <th>Stay Duration</th>
                        <th>Booking Date</th>
                        <th>Property Owner</th>
                    </tr>
                    @foreach ($fetchBookingRecords as $record)
                        <tr>
                            <td>{{ $record->full_name }}</td>
                            <td>{{ $record->phone_number }}</td>
                            <td>{{ $record->adults }}</td>
                            <td>{{ $record->childrens }}</td>
                            <td>{{ $record->totalMonthsToStay }} Months</td>
                            <td>{{ $record->booking_date }}</td>
                            <td>{{ $record->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
