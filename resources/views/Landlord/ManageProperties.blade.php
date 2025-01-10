@extends('LandlordLayout.LandlordDashboard')
@push('style')
    <style>
        .thumbnail-img {
            height: 200px;
            width: 200px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold text-center">Manage <span class="text-forest-green">Properties</span></h3>
        </div>

        <div class="row mt-3" style="overflow-x: scroll">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Property Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($fetchAllProperties as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                <img src="{{ asset('Properties/Thumbnail/' . $record->property_thumbnail) }}" alt=""
                                    class="img-fluid thumbnail-img">
                            </td>
                            <td>{{ $record->property_name }}</td>
                            <td>{{ $record->property_address }}</td>
                            <td class="text-center">
                                <a href="{{ route('Landlord.TogglePropertyStatus', ['id' => $record->id]) }}"
                                    class="text-dark">
                                    <i
                                        class="{{ $record->property_status == 'Rented' ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Landlord.ViewProperty', ['id' => $record->id]) }}" class="text-success">
                                    <i class="fa-solid fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Landlord.EditProperty', ['id' => $record->id]) }}"
                                    class="text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
