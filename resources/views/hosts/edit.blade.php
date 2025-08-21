@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">
                        <div class="row">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="card-title text-secondary fw-bold">Edit Host</h5>


                            </div>


                            <hr>
                            {{-- for check success or error message --}}
                            @include('components.messages')
                            {{-- Success and Error Messages when form fill --}}
                            <form action="{{ route('hosts.update', $host->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Important for update -->

                                <!-- Tab Content -->
                                <div class="p-4 shadow-sm tab-content card">

                                    <!-- Personal Info Tab -->
                                    <hr>
                                    <h6>Personal Info</h6>
                                    <hr>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="shadow-sm form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $host->user->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Gender</label>
                                            <select class="shadow-sm form-select @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male"
                                                    {{ old('gender', $host->user->gender) == 'Male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female"
                                                    {{ old('gender', $host->user->gender) == 'Female' ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text"
                                                class="shadow-sm form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone', $host->user->phone) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Visit Details Tab -->
                                    <hr>
                                    <h6>Other Details</h6>
                                    <hr>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Department</label>
                                            <select id="department" name="department_id"
                                                class="form-control shadow-sm @error('department_id') is-invalid @enderror">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ old('department_id', $host->department_id) == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <select id="designation" name="designation_id"
                                                class="form-control shadow-sm @error('designation_id') is-invalid @enderror">
                                                <option value="">Select Designation</option>
                                                <!-- Designations will be loaded here via AJAX -->
                                            </select>
                                            @error('designation_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Status <span class="text-danger">*</span></label>
                                            <select name="status"
                                                class="form-control shadow-sm @error('status') is-invalid @enderror">
                                                <option value="">Select Status</option>
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status }}"
                                                        {{ old('status', $host->status) == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 d-flex justify-content-end">
                                        <button type="submit" class="p-1 px-3 btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </div>
                            </form>




                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Listen for changes to the department dropdown
        $('#department').on('change', function() {
            let departmentId = $(this).val();

            if (departmentId) {
                // Make an AJAX request to fetch designations
                $.ajax({
                    url: `/departments/${departmentId}/designations`, // The route URL
                    type: 'GET', // The HTTP method
                    dataType: 'json', // Expected response type
                    success: function(data) {
                        // Reset the designation dropdown
                        let designationSelect = $('#designation');
                        designationSelect.empty(); // Clear existing options
                        designationSelect.append(
                            '<option value="">Select Designation</option>'); // Add default option

                        // Populate the designation dropdown with the new options
                        $.each(data.designations, function(index, designation) {
                            designationSelect.append('<option value="' + designation.id + '">' +
                                designation.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching designations:', error);
                    }
                });
            } else {
                // If no department selected, reset the designation dropdown
                $('#designation').empty().append('<option value="">Select Designation</option>');
            }
        });
    </script>
@endpush
