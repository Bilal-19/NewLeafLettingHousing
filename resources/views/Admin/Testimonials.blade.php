@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center text-forest-green">Testimonial</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Message</th>
                        <th>Visible</th>
                    </tr>

                    @foreach ($fetchTenantFeedback as $record)
                        <tr>
                            <td>{{$record->tenant_name}}</td>
                            <td>{{$record->tenant_email}}</td>
                            <td>{{$record->tenant_country}}</td>
                            <td>{{$record->tenant_message}}</td>
                            <td class="text-center">
                                <a href="{{route("Admin.ToggleTestimonials", ['id' => $record->id])}}" class="text-dark">
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
