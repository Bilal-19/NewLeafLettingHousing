@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center text-forest-green">Stories</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('Add.Story') }}" class="btn btn-dark">Add New Story</a>
        </div>
    </div>

@endsection
