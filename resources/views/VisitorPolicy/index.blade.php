@extends('layouts.master')



@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh table wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-secondary fw-bold">Visitor Policies</h5>
                            <!-- "Create Company" Button to Trigger Modal -->
                            <button class="p-1 btn btn-sm btn-primary" data-toggle="modal" data-target="#companyModal">
                                <i class="fas fa-plus"></i> Create
                            </button>

                            <!-- Company Input Modal -->
                            <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl custom-modal-width" style=" max-width: 50% !important;">
                                    <div class="modal-content">
                                        <div class="pb-3 text-white modal-header d-flex align-item-center"
                                            style="background-color: #950606">
                                            <h5 class="modal-title" id="companyModalLabel">Add Visitor
                                                Policies</h5>
                                            <button type="button" class="mt-1 btn-close" style="color: white"
                                                data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('visitor-policy.store') }}" method="POST"
                                                enctype="multipart/form-data" class="p-2">
                                                @csrf

                                                <!-- Title Input -->
                                                <div class="mb-3">
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Enter Title" required>
                                                </div>

                                                <!-- Description Input -->
                                                <div class="mb-3">
                                                    <input type="text" name="description" class="form-control"
                                                        placeholder="Enter Description" required>
                                                </div>

                                                <!-- File Attachment Input -->
                                                <div class="mb-3">
                                                    <input type="file" name="attachment" class="form-control">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">File Attachment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitor_policies as $policy)
                                        <tr>
                                            <td>{{ $policy->title }}</td>
                                            <td>{{ $policy->description }}</td>
                                            <td>
                                                @if ($policy->attachment)
                                                    <a href="{{ asset('uploads/' . $policy->attachment) }}"
                                                        download>Download</a>
                                                @else
                                                    No file attached
                                                @endif
                                            </td>
                                            <td class="">
                                                <div class="gap-1 d-flex align-items-center">
                                                    <a href="{{ route('visitor-policy.show', $policy->id) }}"
                                                        class="btn btn-xs btn-success">
                                                        <i class="cursor-pointer fas fa-eye"></i>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#companyModal{{ $policy->id }}"
                                                        class="btn btn-xs btn-info">
                                                        <i class="cursor-pointer fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('visitor-policy.show', $policy->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');"
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
                                        @include('VisitorPolicy.edit')
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
