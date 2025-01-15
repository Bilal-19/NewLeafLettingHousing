@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center"><span class="text-forest-green">Landlords</span> List</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Listed Properties</th>
                        <th>Available Properties</th>
                        <th>Rented Properties</th>
                    </tr>

                    @foreach ($fetchPropertyRecord as $record)
                        <tr>
                            <td>{{ $record->property_owner_name }}</td>
                            <td>{{ $record->property_owner_email }}</td>
                            <td>{{ $record->property_owner_phone ?? 'Not Provide' }}</td>
                            <td class="text-center">{{ $record->total_properties }}</td>
                            <td class="text-center">{{ $record->total_available_properties }}</td>
                            <td class="text-center">{{ $record->total_rented_properties }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
