@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Edit <span class="text-forest-green">Team Member</span></h3>
        </div>

        <div class="row">
            <form action="{{route("Admin.Update.Team", ['id' => $findMemberRecord->id])}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Member Name: </label>
                    <input type="text" name="name" class="form-control" value="{{$findMemberRecord->name}}">
                    <small class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Member Profile Picture: </label>
                    <input type="file" name="profile" class="form-control">
                    <small class="text-danger">
                        @error('profile')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Member Position: </label>
                    <input type="text" name="position" class="form-control" value="{{$findMemberRecord->position}}">
                    <small class="text-danger">
                        @error('position')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Member Description: </label>
                    <textarea name="description" rows="3" class="form-control" style="resize: none;">{{$findMemberRecord->description}}</textarea>
                    <small class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Linkedin Profile: </label>
                    <input type="text" name="linkedinLink" class="form-control" value="{{$findMemberRecord->linkedin_profile}}">
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Facebook Profile: </label>
                    <input type="text" name="fbLink" class="form-control" value="{{$findMemberRecord->facebook_profile}}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Instagram Profile: </label>
                    <input type="text" name="instagramLink" class="form-control" value="{{$findMemberRecord->instagram_profile}}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
