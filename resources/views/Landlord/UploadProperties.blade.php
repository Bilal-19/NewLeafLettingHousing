@extends('LandlordLayout.LandlordDashboard')
@push('style')
    <style>
        input,
        textarea {
            background-color: #f5f5f5;
        }

        @media only screen and (max-width: 768px) {
           .mb-sm-10{
            margin-bottom: 10px;
           }
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Add New <span class="text-forest-green">Property</span></h3>
        </div>

        <div class="row mt-3">
            <form action="{{ route('Landlord.CreateProperties') }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-around">
                    <div class="col-md-5 mb-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Property Name"
                            value="{{ old('name') }}">
                        <small class="text-danger">
                            @error('name')
                                {{ 'Please enter property name' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <input type="text" name="address" class="form-control" placeholder="Address"
                            value="{{ old('address') }}">
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
                            <option value="Apartment" {{ old('property_type') == 'Apartment' ? 'selected' : '' }}>Apartment
                            </option>
                            <option value="House" {{ old('property_type') == 'House' ? 'selected' : '' }}>House</option>
                            <option value="Studio" {{ old('property_type') == 'Studio' ? 'selected' : '' }}>Studio</option>
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
                            <option value="Available" {{ old('property_status') == 'Available' ? 'selected' : '' }}>
                                Available</option>
                            <option value="Rented" {{ old('property_status') == 'Rented' ? 'selected' : '' }}>Rented
                            </option>
                        </select>
                        <small class="text-danger">
                            @error('property_status')
                                {{ 'Please select property status' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-around">
                    <div class="col-md-5 mb-sm-10">
                        <input type="text" name="rent" class="form-control" placeholder="Monthly Rent"
                            value="{{ old('rent') }}">
                        <small class="text-danger">
                            @error('rent')
                                {{ 'Please enter monthly rent' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <input type="text" name="sqFeetArea" class="form-control" placeholder="Square Feet Area"
                            value="{{ old('sqFeetArea') }}">
                        <small class="text-danger">
                            @error('sqFeetArea')
                                {{ 'Please enter Square Feet Area' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <textarea type="text" name="description" class="form-control" placeholder="Description" rows="5"
                            style="resize:none;">{{ old('description') }}</textarea>
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
                            rows="3" style="resize:none;">{{ old('features') }}</textarea>
                        <small class="text-danger">
                            @error('features')
                                {{ 'Please enter comma separated property features' }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row d-flex justify-content-around mt-3">
                    <div class="col-md-3 mb-sm-10">
                        <select name="bedrooms" class="form-select">
                            <option value="">Select No of Bedrooms</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{ old('bedrooms') == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        <small class="text-danger">
                            @error('bedrooms')
                                {{ 'Please select no of bedrooms' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-3 mb-sm-10">
                        <select name="bathrooms" class="form-select">
                            <option value="">Select No of Bathrooms</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{ old('bathrooms') == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        <small class="text-danger">
                            @error('bathrooms')
                                {{ 'Please select no of bathrooms' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-3 mb-sm-10">
                        <select name="receptions" class="form-select">
                            <option value="">Select No of Receptions</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" {{ old('receptions') == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
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
                    <div class="col-md-5 mb-sm-10">
                        <label class="form-label mb-0">Upload Thumbnail Image:</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <small class="text-danger">
                            @error('thumbnail')
                                {{ 'Please upload thumnnail image' }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label mb-0">Upload Multiple Images:</label>
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
                        <button class="btn btn-success">Add Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
