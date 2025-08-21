@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title text-secondary fw-bold">Id Type settings</h5>
                                <div>
                                    <button class="p-1 btn btn-primary btn-sm" data-toggle="modal" data-target="#companyModal">
                                        <i class="fas fa-plus"></i> Add Id Type
                                    </button>
                                </div>

                                <!-- Company Input Modal -->
                                <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="pb-3 text-white modal-header" style="background-color: #950606;">
                                                <h5 class="modal-title" id="companyModalLabel">Add
                                                    Id Type</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('IdType.store') }}">
                                                    @csrf
                                                    <div class="row g-3">
                                                        <!-- Name -->
                                                        <div class="col-md-12">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" name="name"
                                                                class="shadow-sm form-control" required>

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
                            </div>


                            <hr>
                            {{-- for check success or error message --}}
                            @include('components.messages')
                            {{-- Success and Error Messages when form fill --}}
                            {{-- table --}}
                            <div class="mt-4 table-responsive">
                                <table class="table border rounded  table-hover">
                                    <thead class="table-light">
                                        <tr>

                                            <th> Name</th> <!-- type Name column -->
                                            <th>Action</th> <!-- Action column -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($idTypes as $type)
                                            <tr>

                                                <td>{{ $type->name }}</td>
                                                <td>
                                                    <div class="gap-1 d-flex align-items-center">

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#companyModal{{ $type->id }}"
                                                            class="btn btn-xs btn-info">
                                                            <i class="cursor-pointer fas fa-edit"></i>
                                                            <!-- Edit -->
                                                        </a>
                                                        @include('IdType.edit')
                                                        <form action="{{ route('IdType.destroy', $type->id) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?');"
                                                            class="p-0 m-0 d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-xs btn-danger">
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
            {{-- <!-- /.content-wrapper --> --}}
            {{-- @include('partials.footer') --}}
        </div>
    @endsection
