@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Add New <span class="text-forest-green">Story</span></h3>
        </div>

        <div class="row">
            <form action="{{route("Create.Story")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Thumbnail Image: </label>
                    <input type="file" name="thumbnailImg" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Story Headline: </label>
                    <input type="text" name="headline" class="form-control" placeholder="Enter story headline" value="{{old("headline")}}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Story Content: </label>
                    <textarea name="content" cols="30" rows="6" class="form-control" placeholder="Enter story content" style="resize:none;" value={{old("content")}}></textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
