@extends('LandlordLayout.LandlordDashboard')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center"><span class="text-forest-green">Feedback</span></h3>
        </div>

        <div class="row">
            <form action="{{route('Landlord.SubmitFeeback')}}" autocomplete="off" method="post">
                @csrf
                <div class="col-md-5 mx-auto">
                    <label class="form-label mb-0">Name: </label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                    <small class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Email Address: </label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    <small class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Country: </label>
                    <input type="text" name="country" class="form-control">
                    <small class="text-danger">
                        @error('country')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <label class="form-label mb-0">Message: </label>
                    <textarea name="message" cols="30" rows="6" class="form-control" style="resize:none;"></textarea>
                    <small class="text-danger">
                        @error('message')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="col-md-5 mx-auto mt-3">
                    <button class="btn btn-success w-100">Send Feedback</button>
                </div>
            </form>
        </div>
    </div>
@endsection
