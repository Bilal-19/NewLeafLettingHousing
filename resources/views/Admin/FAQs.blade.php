@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Frequest Asked <span class="text-forest-green">Question Answer</span></h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('Add.FAQ') }}" class="btn btn-dark">Add New FAQ</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($fetchAllFAQs as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{$record->question}}</td>
                            <td>{!!$record->answer!!}</td>
                            <td class="text-center">
                                <a href="{{ route('Edit.FAQ', ['id' => $record->id]) }}">
                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Delete.FAQ', ['id' => $record->id]) }}">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
