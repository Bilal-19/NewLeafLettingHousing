@extends('LandlordLayout.LandlordDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">My <span class="text-forest-green">Profile</span></h3>
        </div>

        <div class="row mt-3">
            <form action="{{route('Landlord.Update.Profile')}}" method="post">
                @csrf
                <div class="col-md-5 mx-auto">
                    <label class="form-label mb-0">Full Name: </label>
                    <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Email: </label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Phone Number: </label>
                    <input type="text" name="phone_number" value="{{Auth::user()->phone_number}}" class="form-control">
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Property Address: </label>
                    <input type="text" name="property_address" value="{{Auth::user()->property_address}}" class="form-control">
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Property Type: </label>
                    <select name="property_type" class="form-select">
                        <option value="Apartment" {{Auth::user()->property_type == 'Apartment' ? 'selected' : ''}}>Apartment</option>
                        <option value="House" {{Auth::user()->property_type == 'House' ? 'selected' : ''}}>House</option>
                        <option value="Studio" {{Auth::user()->property_type == 'Studio' ? 'selected' : ''}}>Studio</option>
                    </select>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <button class="btn btn-success">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection
