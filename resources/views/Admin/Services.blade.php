@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Offered <span class="text-forest-green">Services</span></h3>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('Admin.AddService') }}" class="btn btn-dark">Add New Service</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Icon</th>
                        <th>Service Name</th>
                        <th>Service Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllServices as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                <img src="{{ asset('Services/' . $record->icon) }}" alt="{{ $record->service_name }}"
                                    class="img-fluid">
                            </td>
                            <td>{{ $record->service_name }}</td>
                            <td>{{ $record->service_description }}</td>
                            <td class="text-center">
                                <a href="{{ route('Edit.Service', ['id' => $record->id]) }}">
                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Delete.Service', ['id' => $record->id]) }}">
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
