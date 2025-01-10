@extends('LandlordLayout.LandlordDashboard')
@push('style')
    <style>
        input,
        textarea {
            background-color: #f5f5f5;
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Edit <span class="text-forest-green">Property</span></h3>
        </div>

        <div class="row mt-3">
            <form action="{{ route('Landlord.CreateProperties') }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-around">
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control" placeholder="Property Name" value="{{$findProperty->property_name}}">
                        <small class="text-danger">
                            @error('name')
                                {{ 'Please enter property name' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{$findProperty->property_address}}">
                        <small class="text-danger">
                            @error('name')
                                {{ 'Please enter property address' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <select name="property_type" class="form-select">
                            <option>Select Property Type</option>
                            <option value="Apartment" {{$findProperty->property_type == 'Apartment' ? 'selected' : ''}}>Apartment</option>
                            <option value="House" {{$findProperty->property_type == 'House' ? 'selected' : ''}}>House</option>
                            <option value="Studio" {{$findProperty->property_type == 'Studio' ? 'selected' : ''}}>Studio</option>
                        </select>
                        <small class="text-danger">
                            @error('property_type')
                                {{ 'Please select property type' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <select name="property_status" class="form-select">
                            <option>Select Property Status</option>
                            <option value="Available" {{$findProperty->property_status == 'Available' ? 'selected' : ''}}>Available</option>
                            <option value="Rented" {{$findProperty->property_status == 'Rented' ? 'selected' : ''}}>Rented</option>
                        </select>
                        <small class="text-danger">
                            @error('property_status')
                                {{ 'Please select property status' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <input type="text" name="rent" class="form-control" placeholder="Monthly Rent" value="{{$findProperty->monthly_rent}}">
                        <small class="text-danger">
                            @error('rent')
                                {{ 'Please enter monthly rent' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <textarea type="text" name="description" class="form-control" placeholder="Description" rows="5"
                            style="resize:none;">{{$findProperty->property_description}}</textarea>
                        <small class="text-danger">
                            @error('description')
                                {{ 'Please enter property description' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <textarea type="text" name="features" class="form-control" placeholder="Write House Features (Comma Separated)"
                            rows="3" style="resize:none;">{{$findProperty->property_features}}</textarea>
                        <small class="text-danger">
                            @error('features')
                                {{ 'Please enter comma separated property features' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row d-flex justify-content-around mt-3">
                    <div class="col-md-3">
                        <select name="bedrooms" class="form-select">
                            <option value="">Select No of Bedrooms</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{$findProperty->bedrooms == $i ? 'selected' : ''}}>{{ $i }}</option>
                            @endfor
                        </select>
                        <small class="text-danger">
                            @error('bedrooms')
                                {{ 'Please select no of bedrooms' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-3">
                        <select name="bathrooms" class="form-select">
                            <option value="">Select No of Bathrooms</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{$findProperty->bathrooms == $i ? 'selected' : ''}}>{{ $i }}</option>
                            @endfor
                        </select>
                        <small class="text-danger">
                            @error('bathrooms')
                                {{ 'Please select no of bathrooms' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-3">
                        <select name="receptions" class="form-select">
                            <option value="">Select No of Receptions</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{$findProperty->reception == $i ? 'selected' : ''}}>{{ $i }}</option>
                            @endfor
                        </select>
                        <small class="text-danger">
                            @error('receptions')
                                {{ 'Please select no of receptions' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-around">
                    <div class="col-md-5">
                        <label class="form-label mb-0">Upload Thumbnail Image (Optional):</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <small class="text-danger">
                            @error('thumbnail')
                                {{ 'Please upload thumnnail image' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label mb-0">Upload Multiple Images (Optional):</label>
                        <input type="file" name="images[]" multiple class="form-control">
                        <small class="text-danger">
                            @error('images')
                                {{ 'Please upload multiple images' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col-md-11 mx-auto">
                        <button class="btn btn-success">Update Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
