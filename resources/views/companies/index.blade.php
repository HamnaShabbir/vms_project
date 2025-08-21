@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title text-secondary fw-bold">Companies</h5>
                                <a class="p-1 btn btn-sm btn-primary" href="{{ route('company.create') }}">
                                    <i class="fas fa-plus"></i> Create
                                </a>

                                {{-- <!-- Company Input Modal -->
                                            <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="pb-3 text-white modal-header" style="background-color: #950606;">
                                                            <h5 class="modal-title" id="companyModalLabel">Add New Company</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row g-3">
                                                                    <!-- Company Name -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Company Name</label>
                                                                        <input type="text" class="shadow-sm form-control" name="company_name" placeholder="Enter company name">
                                                                    </div>

                                                                    <!-- Company Email -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Company Email</label>
                                                                        <input type="email" class="shadow-sm form-control" name="company_email" placeholder="Enter company email">
                                                                    </div>

                                                                    <!-- Phone -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Phone</label>
                                                                        <input type="text" class="shadow-sm form-control" name="phone" placeholder="Enter phone number">
                                                                    </div>

                                                                    <!-- Logo -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Logo</label>
                                                                        <input type="file" class="shadow-sm form-control" name="logo">
                                                                    </div>

                                                                    <!-- Website -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Website</label>
                                                                        <input type="text" class="shadow-sm form-control" name="website" placeholder="Enter website URL">
                                                                    </div>

                                                                    <!-- Visitor Policy -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Visitor Policy</label>
                                                                        <select class="shadow-sm form-select" name="visitor_policy" required>
                                                                            <option selected disabled>Choose...</option>
                                                                            <option value="Restricted">Restricted</option>
                                                                            <option value="Open">Open</option>
                                                                            <option value="By Approval">By Approval</option>
                                                                        </select>
                                                                    </div>

                                                                    <!-- Timezone -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Timezone</label>
                                                                        <select class="shadow-sm form-select" name="timezone" required>
                                                                            <option selected disabled>Choose Timezone...</option>
                                                                            <option value="GMT">GMT</option>
                                                                            <option value="UTC">UTC</option>
                                                                            <option value="PST">PST</option>
                                                                            <option value="EST">EST</option>
                                                                            <option value="CST">CST</option>
                                                                            <option value="IST">IST</option>
                                                                        </select>
                                                                    </div>

                                                                    <!-- Status -->
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Status</label>
                                                                        <select class="shadow-sm form-select" name="status" required>
                                                                            <option value="Active" selected>Active</option>
                                                                            <option value="Inactive">Inactive</option>
                                                                            <option value="Pending">Pending</option>
                                                                        </select>
                                                                    </div>

                                                                    <!-- Address -->
                                                                    <div class="col-md-12">
                                                                        <label class="form-label">Address</label>
                                                                        <input type="text" class="shadow-sm form-control" name="address" placeholder="Enter company address">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                        <h6>Login Info</h6>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="text" class="shadow-sm form-control" name="email" placeholder="Enter Company Admin Email">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Password</label>
                                                                        <input type="password" class="shadow-sm form-control" name="password" placeholder="Enter Password">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Confirm Password</label>
                                                                        <input type="password" class="shadow-sm form-control" name="password_confirmation" placeholder="Confirm Password">
                                                                    </div>

                                                                </div>

                                                                <!-- Submit Button -->
                                                                <div class="mt-4 text-end">
                                                                    <button type="button" class="p-1 btn btn-sm btn-secondary" data-bs-dismiss="modal">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </button>
                                                                    <button type="submit" class="p-1 shadow btn btn-sm save">
                                                                        <i class="fas fa-save"></i> Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                            </div>


                            <hr>
                            {{-- for check success or error message --}}
                            @include('components.messages')
                            {{-- Success and Error Messages when form fill --}}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Company Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">Visitor Policy</th>
                                            <th scope="col">Timezone</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td>{{ $company->company_name }}</td>
                                                <td>{{ $company->company_email }}</td>
                                                <td>{{ $company->phone }}</td>
                                                <td>
                                                    <img src="{{ $company->logo_url }}" width="25" height="25"
                                                        class="rounded rounded-circle">
                                                </td>
                                                <td>
                                                    <a href="{{ $company->website }}" target="_blank">Visit</a>
                                                </td>
                                                <td>{{ $company->visitor_policy }}</td>
                                                <td>{{ $company->timezone }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $company->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $company->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $company->address }}</td>
                                                <td class="">
                                                    <div class="gap-1 d-flex align-items-center">
                                                        <a href="{{ route('company.show', $company->id) }}"
                                                            class=" btn-success btn btn-xs">
                                                            <i class="cursor-pointer fas fa-eye"></i>
                                                        </a>

                                                        <a href="{{ route('company.edit', $company->id) }}"
                                                            class="btn-info btn btn-xs">
                                                            <i class="cursor-pointer fas fa-edit"></i>
                                                        </a>
                                                        @if (auth()->user()->company_id != $company->id)
                                                            <form action="{{ route('company.destroy', $company->id) }}"
                                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-xs btn-danger">
                                                                    <i class="cursor-pointer fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
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
