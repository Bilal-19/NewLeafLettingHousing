@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Edit <span class="text-forest-green">Partner</span></h3>
        </div>

        <div class="row">
            <form action="{{ route('Admin.Update.Partner', ['id'=>$findPartnerCompany->id]) }}" method="post" autocomplete="off">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Organization Name: </label>
                    <input type="text" name="organization_name" class="form-control" value="{{$findPartnerCompany->organization_name}}">
                    <small class="text-danger">
                        @error('organization_name')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Brief Description About Organization: </label>
                    <textarea name="organization_description" class="form-control" rows="6" style="resize:none;">{{$findPartnerCompany->organization_description}}</textarea>
                    <small class="text-danger">
                        @error('organization_description')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
