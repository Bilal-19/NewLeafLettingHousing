@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Our Team</h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{route("Admin.AddTeam")}}" class="btn btn-dark">Add Team Member</a>
            </div>
        </div>
    </div>
@endsection
