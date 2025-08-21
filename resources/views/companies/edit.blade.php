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
                                <h5 class="card-title text-secondary fw-bold">Edit Company</h5>
                            </div>



                            <hr>
                            {{-- for check success or error message --}}
                            @include('components.messages')
                            {{-- Success and Error Messages when form fill --}}
                            <form action="{{ route('company.update', $company->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')


                                @csrf
                                <div class="row g-3">
                                    <!-- Company Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ $company->company_name }}"
                                            placeholder="Enter company name">
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Company Email -->
                                    <div class="col-md-6">
                                        <label class="form-label">Company Email</label>
                                        <input type="email"
                                            class="shadow-sm form-control @error('company_email') is-invalid @enderror"
                                            name="company_email" value="{{ $company->company_email }}"
                                            placeholder="Enter company email">
                                        @error('company_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ $company->phone }}" placeholder="Enter phone number">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Logo -->
                                    <div class="col-md-6">
                                        <label class="form-label">Logo</label>
                                        <input type="file"
                                            class="shadow-sm form-control @error('logo') is-invalid @enderror"
                                            name="logo">
                                        @error('logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Website -->
                                    <div class="col-md-6">
                                        <label class="form-label">Website</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('website') is-invalid @enderror"
                                            name="website" value="{{ $company->website }}" placeholder="Enter website URL">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Visitor Policy -->
                                    <div class="col-md-6">
                                        <label class="form-label">Visitor Policy</label>
                                        <select class="shadow-sm form-select @error('visitor_policy') is-invalid @enderror"
                                            name="visitor_policy" required>
                                            <option disabled {{ $company->visitor_policy ? '' : 'selected' }}>Choose...
                                            </option>
                                            <option value="Restricted"
                                                {{ $company->visitor_policy == 'Restricted' ? 'selected' : '' }}>
                                                Restricted</option>
                                            <option value="Open"
                                                {{ $company->visitor_policy == 'Open' ? 'selected' : '' }}>
                                                Open</option>
                                            <option value="By Approval"
                                                {{ $company->visitor_policy == 'By Approval' ? 'selected' : '' }}>
                                                By Approval</option>
                                        </select>
                                        @error('visitor_policy')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Timezone -->
                                    <div class="col-md-6">
                                        <label class="form-label">Timezone</label>
                                        <select class="shadow-sm form-select @error('timezone') is-invalid @enderror"
                                            name="timezone" required>
                                            <option disabled {{ $company->timezone ? '' : 'selected' }}>
                                                Choose Timezone...</option>
                                            <option value="GMT" {{ $company->timezone == 'GMT' ? 'selected' : '' }}>GMT
                                            </option>
                                            <option value="UTC" {{ $company->timezone == 'UTC' ? 'selected' : '' }}>UTC
                                            </option>
                                            <option value="PST" {{ $company->timezone == 'PST' ? 'selected' : '' }}>PST
                                            </option>
                                            <option value="EST" {{ $company->timezone == 'EST' ? 'selected' : '' }}>EST
                                            </option>
                                            <option value="CST" {{ $company->timezone == 'CST' ? 'selected' : '' }}>CST
                                            </option>
                                            <option value="IST" {{ $company->timezone == 'IST' ? 'selected' : '' }}>IST
                                            </option>
                                        </select>
                                        @error('timezone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="shadow-sm form-select @error('status') is-invalid @enderror"
                                            name="status" required>
                                            <option value="Active" {{ $company->status == 'Active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="Inactive"
                                                {{ $company->status == 'Inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                            <option value="Pending" {{ $company->status == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <label class="form-label">Address</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('address') is-invalid @enderror"
                                            name="address" value="{{ $company->address }}"
                                            placeholder="Enter company address">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4 text-end d-flex justify-content-end">
                                    <a href="{{ route('company.index') }}" class="p-1 btn btn-secondary">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                    <button type="submit" class="p-1 mx-1 shadow btn btn-sm btn-primary">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endsection
