@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Frequest Asked <span class="text-forest-green">Question Answer</span></h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{route('Add.FAQ')}}" class="btn btn-dark">Add New FAQ</a>
            </div>
        </div>
    </div>
@endsection
