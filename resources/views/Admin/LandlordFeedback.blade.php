@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Landlord <span class="text-forest-green">Feedback</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date & Time</th>
                    </tr>

                    @foreach ($fetchLandlordQueries as $record)
                        <tr>
                            <td>{{$record->name}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->message}}</td>
                            <td>
                                {{date('d M Y', strtotime($record->created_at))}}
                                {{date('h:i a', strtotime($record->created_at))}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
