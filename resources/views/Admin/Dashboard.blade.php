@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Admin <span class="text-forest-green">Dashboard</span></h3>
        </div>

        <div class="row">
            <p>Welcome <span class="text-forest-green">{{Auth::user()->name}}</span></p>
        </div>
    </div>
@endsection
