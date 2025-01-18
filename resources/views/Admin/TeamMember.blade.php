@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Our Team</h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('Admin.AddTeam') }}" class="btn btn-dark">Add Team Member</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>View Profile</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchTeamRecords as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                <img src="{{ asset('Team/' . $record->profile_picture) }}"
                                    alt="{{ $record->name }} Profile Picture" class="img-fluid rounded-circle"
                                    style="height:80px;width:80px;object-fit:cover;">
                            </td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->position }}</td>
                            <td class="text-center">
                                <a href="{{ route('Admin.EditTeam', ['id' => $record->id]) }}">
                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Admin.Delete.Team', ['id' => $record->id]) }}">
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
