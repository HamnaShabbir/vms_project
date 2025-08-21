@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title text-secondary fw-bold">Create Receptionist</h5>


                            </div>


                            <hr>
                            {{-- for check success or error message --}}
                            @include('components.messages')
                            {{-- Success and Error Messages when form fill --}}
                            <form action="{{ route('receptionist.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="shadow-sm form-control"
                                            placeholder="Enter full name" required>
                                    </div>



                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" class="shadow-sm form-control"
                                            placeholder="Enter phone number" required>
                                    </div>



                                    <!-- Login Info -->
                                    <div class="col-md-12">
                                        <hr>
                                        <h6>Login Info</h6>
                                    </div>

                                    <div class="col-md-12">
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
                                    <!-- Submit Button -->
                                    <div class="mt-4 text-end">
                                        <a href="{{ route('receptionist.index') }}" class="p-1 btn btn-sm btn-secondary" data-bs-dismiss="modal">
                                            <i class="pl-1 fas fa-times"></i> Cancel
                                        </a>
                                        <button type="submit" class="p-1 shadow btn btn-sm btn-primary">
                                            <i class="pr-1 fas fa-save"></i> Save
                                        </button>
                                    </div>
                            </form>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
  @endsection
