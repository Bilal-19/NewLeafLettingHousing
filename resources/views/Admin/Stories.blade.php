@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center text-forest-green">Stories</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('Add.Story') }}" class="btn btn-dark">Add New Story</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($fetchAllStories as $rec)
                    <tr>
                        <td>{{ $rec->id }}</td>
                        <td><img src="{{ asset('Story/' . $rec->thumbnail_image) }}" class="story-preview-img img-fluid"
                                alt=""></td>
                        <td>
                            <h4>{{ $rec->headline }}</h4>
                            {{ Str::limit($rec->content, 100) }}
                        </td>
                        <td class="text-center">
                            <a href="{{route('Edit.Story', ['id'=>$rec->id])}}">
                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="#">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
