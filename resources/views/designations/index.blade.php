@extends('layouts.master')



@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">

            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title text-secondary fw-bold">Designation settings</h5>
                                <div>
                                    <button composition="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#createModal">
                                        <i class="fas fa-plus"></i> Add Designation
                                    </button>


                                </div>


                            </div>


                            <hr>
                            {{-- for check success or error message --}}
                            @include('components.messages')
                            {{-- Success and Error Messages when form fill --}}
                            {{-- table --}}
                            <div class="mt-4 table-responsive">
                                <table class="table border rounded table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>

                                            <th>Designation Name</th> <!-- Department Name column -->
                                            <th>Department</th> <!-- Department Name column -->
                                            <th>Action</th> <!-- Action column -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($designations as $designation)
                                            <tr>

                                                <td>{{ $designation->name }}</td>
                                                <td>{{ $designation->department->name ?? '' }}</td>
                                                <td>
                                                    <div class="gap-1 d-flex align-items-center">

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#companyModal{{ $designation->id }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="cursor-pointer fas fa-edit"></i>
                                                        </a>
                                                        @include('designations.edit')
                                                        <form action="{{ route('designations.destroy', $designation->id) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?');"
                                                            class="p-0 m-0 d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="cursor-pointer fas fa-trash "></i>
                                                                <!-- Delete -->
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
        {{-- Create --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="pb-3 text-white modal-header" style="background-color: #950606;">
                        <h5 class="modal-title" id="companyModalLabel">Add
                            Designation</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('designations.store') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="shadow-sm form-control"
                                        placeholder="Enter full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <select name="department_id" id="" class="form-control">
                                        <option value="">Select Department
                                        </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">
                                                {{ $department->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <!-- Submit Button -->
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
        @include('components.footer')
    @endsection
