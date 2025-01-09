@extends('LandlordLayout.LandlordDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center"><span class="text-forest-green">Landlord Dashboard</span></h3>
        </div>

        <div class="row">
            <h5>Welcome <span class="text-forest-green">{{ Auth::user()->name }}</span> !</h5>
        </div>
    </div>
@endsection
