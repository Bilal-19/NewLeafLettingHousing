@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Edit <span class="text-forest-green">Services</span></h3>
        </div>

        <div class="row">
            <form action="{{ route('Update.Service',['id' => $findService->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Service Icon: </label>
                    <input type="file" name="serviceIcon" class="form-control">
                    <small class="text-danger">
                        @error('serviceIcon')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Service Name: </label>
                    <input type="text" name="serviceName" class="form-control" value="{{$findService->service_name}}">
                    <small class="text-danger">
                        @error('serviceName')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Service Description: </label>
                    <textarea name="serviceDescription" cols="30" rows="8" class="form-control" style="resize:none;">{{$findService->service_description}}</textarea>
                    <small class="text-danger">
                        @error('serviceDescription')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
