@extends('LandlordLayout.LandlordDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">View <span class="text-forest-green">Tenants</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Property Name</th>
                        <th>Rent</th>
                        <th>Lease Start</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($fetchMyTenants as $record)
                        <tr>
                            <td>{{$record->full_name}}</td>
                            <td>{{$record->property_name}}</td>
                            <td>${{$record->monthly_rent}}</td>
                            <td>{{date('d M Y', strtotime($record->booking_date))}}</td>
                            <td>{{$record->property_status}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
