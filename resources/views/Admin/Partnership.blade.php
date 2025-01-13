@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Our <span class="text-forest-green">Partner</span> Companies</h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('Admin.Add.Partner') }}" class="btn btn-dark">Add Partner Companies</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Organization Name</th>
                        <th>Organization Brief Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllRecords as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->organization_name }}</td>
                            <td>{{ $record->organization_description }}</td>
                            <td class="text-center">
                                <a href="{{ route('Admin.Edit.Partner', ['id' => $record->id]) }}">
                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Admin.Delete.Partner', ['id' => $record->id]) }}">
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
