@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh table wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title text-secondary fw-bold">Company Setting</h5>
                        </div>
                        <hr>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        {{-- <form action="" method="" enctype="multipart/form-data" class="p-2"> --}}
                        {{-- @csrf --}}
                        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data"
                            class="p-2">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Company Name -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Enter Company Name" required value="{{ $company->company_name }}">
                                </div>

                                <!-- Company Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Company Email</label>
                                    <input type="email" name="company_email" class="form-control"
                                        placeholder="Enter Company Email" required value="{{ $company->company_email }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Company Phone -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="company_phone" class="form-control"
                                        placeholder="Enter Company Phone Number" required value="{{ $company->phone }}">
                                </div>

                                <!-- Company Website -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Website</label>
                                    <input type="url" name="company_website" class="form-control"
                                        placeholder="Enter Company Website" value="{{ $company->website }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Company Logo Upload -->
                                <div class="mb-3 col-md-6">
                                    <label for="company_logo" class="form-label">Upload Company Logo</label>
                                    <input type="file" name="company_logo" id="company_logo" class="form-control">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 text-end">
                                <button type="submit" class="p-1 shadow btn btn-primary btn-sm">
                                    <i class="pr-1 fas fa-save"></i> Save
                                </button>
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
