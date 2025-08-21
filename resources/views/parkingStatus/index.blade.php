@extends('layouts.master')



@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh table wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-secondary fw-bold">Parking Status</h5>
                            <!-- "Create Parking Status" Button to Trigger Modal -->
                            <button class="p-1 btn btn-sm btn-primary" data-toggle="modal" data-target="#statusModal">
                                <i class="fas fa-plus"></i> Create
                            </button>

                            <!-- Parking Status Modal -->
                            <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl custom-modal-width" style="max-width: 50% !important;">
                                    <div class="modal-content">
                                        <div class="pb-3 text-white modal-header d-flex align-item-center"
                                            style="background-color: #950606">
                                            <h5 class="modal-title" id="statusModalLabel">Add Parking Status
                                            </h5>
                                            <button type="button" class="mt-1 btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- for check success or error message --}}
                                            {{-- @include('components.messages') --}}
                                            {{-- Success and Error Messages when form fill --}}
                                            <form id="statusForm" class="p-2" accept="{{ route('parkingStatus.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="statusName" class="form-label">Name
                                                            *</label>
                                                        <input type="text" id="statusName" name="name"
                                                            class="form-control" placeholder="Enter Status Name" required>
                                                    </div>

                                                    <div class="mb-3 col-md-2">
                                                        <label for="statusColour" class="form-label">Colour
                                                            *</label>
                                                        <input type="color" id="statusColour" name="color"
                                                            class="form-control form-control-color w-100" value="#000000"
                                                            required>
                                                    </div>

                                                    <div class="mb-3 col-md-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="isActive"
                                                                name="is_active" value="1">
                                                            <label class="form-check-label" for="isActive">Is Active</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button composition="button" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button composition="submit" class="btn-sm btn btn-primary">Save</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Colour</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ParkingStatus as $status)
                                        <tr>
                                            <td><span class="badge"
                                                    style="background-color: {{ $status->color }};">{{ $status->name }}</span>
                                            </td>
                                            <td>
                                                <div
                                                    style="width: 20px;border-radius:50%; height: 20px; background-color: {{ $status->color }};">
                                                </div>
                                            </td>
                                            <td>{{ $status->is_active ? 'Yes' : 'No' }}</td>
                                            <td class="">
                                                <div class="gap-1 d-flex align-items-center">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#statusModal{{ $status->id }}"
                                                        class="btn btn-xs btn-info">
                                                        <i class="cursor-pointer fas fa-edit"></i>
                                                    </a>
                                                    @include('parkingStatus.edit')

                                                    <form action="{{ route('parkingStatus.destroy', $status->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure?');"
                                                        class="p-0 m-0 d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="cursor-pointer fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
