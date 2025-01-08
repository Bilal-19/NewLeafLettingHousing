@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Add New <span class="text-forest-green">FAQ</span></h3>
        </div>

        <div class="row">
            <form action="{{route('Create.FAQ')}}" method="post" autocomplete="off">
                @csrf
                <div class="col-md-5 mx-auto">
                    <label class="form-label mb-0">Question:</label>
                    <input type="text" name="question" class="form-control">
                    <small class="text-danger">
                        @error('question')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Answer:</label>
                    <textarea name="answer" cols="30" rows="8" class="form-control" style="resize: none;"></textarea>
                    <small class="text-danger">
                        @error('answer')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <button class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('answer');
        </script>
    @endpush
@endsection
