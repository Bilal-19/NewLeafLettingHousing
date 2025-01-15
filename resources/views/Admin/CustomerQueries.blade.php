@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Customer <span class="text-forest-green">Queries</span></h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Message</th>
                    </tr>
                    @foreach ($fetchQueries as $record)
                        <tr>
                            {{-- <td>{{ $record->id }}</td> --}}
                            <td>{{ $record->full_name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->phone_number }}</td>
                            <td>{{ $record->message }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
