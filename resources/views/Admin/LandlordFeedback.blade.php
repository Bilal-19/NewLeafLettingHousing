@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Landlord <span class="text-forest-green">Feedback</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Visible</th>
                    </tr>

                    @foreach ($fetchLandlordQueries as $record)
                        <tr>
                            <td>{{$record->name}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->message}}</td>
                            <td class="text-center">
                                <a href="{{route("Admin.ToggleLandlordTestimonials", ['id' => $record->id])}}" class="text-dark">
                                    <i class="fa {{$record->visible == 'Yes' ? 'fa-eye' : 'fa-eye-slash'}}"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
