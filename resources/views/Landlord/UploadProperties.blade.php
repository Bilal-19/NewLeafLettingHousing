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
            <h3 class="fw-bold text-center">Add New <span class="text-forest-green">Property</span></h3>
        </div>

        <div class="row mt-3">
            <form action="" autocomplete="off">
                <div class="row d-flex justify-content-around">
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control" placeholder="Property Name">
                    </div>

                    <div class="col-md-5">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <select name="property_type" class="form-select">
                            <option value="">Property Type</option>
                            <option value="Apartment">Apartment</option>
                            <option value="House">House</option>
                            <option value="Studio">Studio</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <select name="property_status" class="form-select">
                            <option value="">Property Status</option>
                            <option value="Available">Available</option>
                            <option value="Rented">Rented</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <input type="text" name="rent" class="form-control" placeholder="Monthly Rent">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <textarea type="text" name="description" class="form-control" placeholder="Description" rows="5"
                            style="resize:none;"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-11 mx-auto">
                        <textarea type="text" name="features" class="form-control" placeholder="Write House Features (Comma Separated)"
                            rows="3" style="resize:none;"></textarea>
                    </div>
                </div>

                <div class="row d-flex justify-content-around mt-3">
                    <div class="col-md-3">
                        <input type="text" name="bedrooms" class="form-control" placeholder="Bedrooms (eg. 2)">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="bathrooms" class="form-control" placeholder="Bathrooms (eg. 2)">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="receptions" class="form-control" placeholder="Reception (eg. 2)">
                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-around">
                    <div class="col-md-5">
                        <label class="form-label mb-0">Upload Thumbnail Image:</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label mb-0">Upload Multiple Images:</label>
                        <input type="file" name="images[]" class="form-control">
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
