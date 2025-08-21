@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title text-secondary fw-bold">Create Company</h5>


                        </div>


                        <hr>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">

                            <div class="modal-body">
                                @csrf
                                <div class="row g-3">
                                    <!-- Company Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ old('company_name') }}"
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
                                            name="company_email" value="{{ old('company_email') }}"
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
                                            name="phone" value="{{ old('phone') }}" placeholder="Enter phone number">
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
                                            name="website" value="{{ old('website') }}" placeholder="Enter website URL">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Visitor Policy -->
                                    {{-- <div class="col-md-6">
                                        <label class="form-label">Visitor Policy</label>
                                        <select class="shadow-sm form-select @error('visitor_policy') is-invalid @enderror" name="visitor_policy" required>
                                            <option disabled {{ old('visitor_policy') ? '' : 'selected' }}>Choose Visitor Policy...</option>
                                            @foreach ($visitorPolicies as $policy)
                                                <option value="{{ $policy->id }}" {{ old('visitor_policy') == $policy->id ? 'selected' : '' }}>
                                                    {{ $policy->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('visitor_policy')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    
                                    
                                    
                                    

                                    <!-- Timezone -->
                                    <div class="col-md-6">
                                        <label class="form-label">Timezone</label>
                                        <select class="shadow-sm form-select @error('timezone') is-invalid @enderror"
                                            name="timezone" required>
                                            <option disabled {{ old('timezone') ? '' : 'selected' }}>Choose Timezone...
                                            </option>
                                            <option value="GMT" {{ old('timezone') == 'GMT' ? 'selected' : '' }}>GMT
                                            </option>
                                            <option value="UTC" {{ old('timezone') == 'UTC' ? 'selected' : '' }}>UTC
                                            </option>
                                            <option value="PST" {{ old('timezone') == 'PST' ? 'selected' : '' }}>PST
                                            </option>
                                            <option value="EST" {{ old('timezone') == 'EST' ? 'selected' : '' }}>EST
                                            </option>
                                            <option value="CST" {{ old('timezone') == 'CST' ? 'selected' : '' }}>CST
                                            </option>
                                            <option value="IST" {{ old('timezone') == 'IST' ? 'selected' : '' }}>IST
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
                                            <option value="Active"
                                                {{ old('status', 'Active') == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
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
                                            name="address" value="{{ old('address') }}"
                                            placeholder="Enter company address">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Login Info -->
                                    <div class="col-md-12">
                                        <hr>
                                        <h6>Login Info</h6>
                                    </div>


                                    {{-- name added --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('name') is-invalid @enderror"
                                            name="text" value="{{ old('name') }}"
                                            placeholder="Enter Company Admin Name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- name added --}}



                                    <div class="col-md-6">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}"
                                            placeholder="Enter Company Admin Email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password"
                                            class="shadow-sm form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                            class="shadow-sm form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" placeholder="Confirm Password">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4 text-end d-flex justify-content-end">
                                    <a href="{{ route('company.index') }}" class="p-1 btn btn-secondary">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                    <button type="submit" class="p-1 mx-1 shadow btn btn-primary btn-sm">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>


        </div>
        
    </div>
@endsection
