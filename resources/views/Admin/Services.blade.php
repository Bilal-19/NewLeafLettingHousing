@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Offered Services</h3>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="{{route('Admin.AddService')}}" class="btn btn-dark">Add New Service</a>
            </div>
        </div>
    </div>
@endsection
