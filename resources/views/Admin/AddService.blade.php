@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Add Services</h3>
        </div>

        <div class="row">
            <form action="">
                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Service Icon: </label>
                    <input type="file" name="serviceIcon" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Service Name: </label>
                    <input type="text" name="serviceName" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Service Description: </label>
                    <textarea name="serviceDescription" cols="30" rows="8" class="form-control" style="resize:none;"></textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
