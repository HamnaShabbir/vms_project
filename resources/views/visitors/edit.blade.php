@extends('layouts.master')


@section('main_content')
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

    <!-- Tagify JS -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">
                        <div class="row">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title text-secondary fw-bold">Edit Visitor</h5>


                            </div>
                        </div>


                        <hr>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <form action="{{ route('visitors.update', $visitor->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Tab Navigation -->
                            {{-- <ul class="mb-3 nav nav-tabs" id="formTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="personal-tab"
                                                        data-bs-toggle="tab" data-bs-target="#personal" type="button"
                                                        role="tab">Personal Info</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="visit-tab" data-bs-toggle="tab"
                                                        data-bs-target="#visit" type="button" role="tab">Visit
                                                        Details</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="security-tab" data-bs-toggle="tab"
                                                        data-bs-target="#security" type="button"
                                                        role="tab">Security Info</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="other-tab" data-bs-toggle="tab"
                                                        data-bs-target="#other" type="button"
                                                        role="tab">Other</button>
                                                </li>
                                            </ul> --}}

                            <!-- Tab Content -->
                            <div class="p-4 shadow-sm tab-content card">

                                <!-- Visitors Details -->
                                <hr>
                                <h3>Visitor Details</h3>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $visitor->name ?? old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Company/Organization <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="company_name" id="company_name"
                                            class="shadow-sm form-control @error('company_name') is-invalid @enderror"
                                            value="{{ $visitor->company_name ?? old('company_name') }}">
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <input type="text" name="department_name" id="department_name"
                                            class="shadow-sm form-control @error('department_name') is-invalid @enderror"
                                            value="{{ $visitor->department_name ?? old('department_name') }}">
                                        @error('department_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designation_name" id="designation_name"
                                            class="shadow-sm form-control @error('designation_name') is-invalid @enderror"
                                            value="{{ $visitor->designation_name ?? old('designation_name') }}">
                                        @error('designation_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Purpose of Visit</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('reason') is-invalid @enderror"
                                            name="reason" value="{{ $visitor->reason ?? old('reason') }}">
                                        @error('reason')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <select class="shadow-sm form-select @error('gender') is-invalid @enderror"
                                            name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ $visitor->gender == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ $visitor->gender == 'Female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ $visitor->phone ?? old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">ID Type</label>
                                        <select class="shadow-sm form-select @error('id_type') is-invalid @enderror"
                                            name="id_type">
                                            <option value="">Select</option>
                                            @foreach ($IdTypes as $type)
                                                <option value="CNIC"
                                                    {{ $visitor->id_type == $type->name ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                            @endforeach

                                        </select>
                                        @error('id_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">ID Number</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('id_number') is-invalid @enderror"
                                            name="id_number" value="{{ $visitor->id_number ?? old('id_number') }}">
                                        @error('id_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- ============================================================================== --}}
                                <!-- Visit Details Tab -->
                                <hr>
                                <h3>Visit Details</h3>
                                <hr>
                                <div class="row g-3">
                                    <!-- Date of Visit -->
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Visit <span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_visit"
                                            class="shadow-sm form-control @error('date_of_visit') is-invalid @enderror"
                                            value="{{ $visitor->date_of_visit ?? old('date_of_visit') }}">
                                        @error('date_of_visit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Time of Arrival -->
                                    <div class="col-md-6">
                                        <label class="form-label">Time of Arrival <span class="text-danger">*</span></label>
                                        <input type="time" name="time_of_arrival"
                                            class="shadow-sm form-control @error('time_of_arrival') is-invalid @enderror"
                                            value="{{ Carbon\Carbon::parse($visitor->time_of_arrival ?? old('time_of_arrival'))->format('H:i') }}">
                                        @error('time_of_arrival')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Date of Exit -->
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Exit</label>
                                        <input type="date" name="date_of_exit"
                                            class="shadow-sm form-control @error('date_of_exit') is-invalid @enderror"
                                            value="{{ $visitor->date_of_exit ?? old('date_of_exit') }}">
                                        @error('date_of_exit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Time of Departure -->
                                    <div class="col-md-6">
                                        <label class="form-label">Time of Departure</label>
                                        <input type="time" name="time_of_departure" class="shadow-sm form-control"
                                            @if ($visitor->time_of_departure) value="{{ Carbon\Carbon::parse($visitor->time_of_departure)->format('H:i') }}" @else @endif>
                                    </div>

                                    <!-- Items Carried (Multi-selector) -->
                                    <div class="col-md-12">
                                        <label class="form-label">Items Carried</label>
                                        <input type="text" name="item_carried" id="item_carried"
                                        class="shadow-sm form-control" value="{{ $visitor->item_carried ?? old('item_carried') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <div class="me-2 w-25">
                                                <label class="form-label d-block">Entry Pass Issued</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="entry_pass_issued" value="Yes"
                                                        class="form-check-input" id="entry_pass_issued"
                                                        {{ $visitor->entry_pass_issued == 'Yes' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="entry_pass_issued">Yes</label>
                                                </div>
                                            </div>
                                            <div class="w-75 badge-number-div">
                                                <label class="form-label">Badge Number</label>
                                                <input type="text" name="badge_number" class="shadow-sm form-control"
                                                    value="{{ $visitor->badge_number ?? old('badge_number') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <div class="me-2 w-25">
                                                <label class="form-label d-block">Escorted</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="is_escorted" value="Yes"
                                                        id="is_escorted" class="form-check-input"
                                                        {{ $visitor->is_escorted == 'Yes' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_escorted">Yes</label>
                                                </div>
                                            </div>
                                            <div class="w-75 entry-pass-div">
                                                <label class="form-label">Escorted Name</label>
                                                <input type="text" name="escorted_name"
                                                    class="shadow-sm form-control @error('escorted_name') is-invalid @enderror"
                                                    value="{{ $visitor->escorted_name ?? old('escorted_name') }}">
                                                @error('escorted_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Parking Details Tab  -->
                                <hr>
                                <h3>Parking Details</h3>
                                <hr>
                                <div class="row g-3">
                                    <!-- Parking Yes/No Radio Buttons -->
                                    <div class="col-md-6">
                                        <label class="form-label d-block text-start">Parking</label>
                                        <div class="gap-4 d-flex">
                                            <!-- Yes Option -->
                                            <div class="ml-3">
                                                <input type="radio" id="parking_yes" name="is_parking" value="Yes"
                                                    class="form-check-input me-2"
                                                    {{ $visitor->is_parking == 'Yes' ? 'checked' : '' }}>
                                                <label for="parking_yes">Yes</label>
                                            </div>
                                            <!-- No Option -->
                                            <div class="ml-3">
                                                <input type="radio" id="parking_no" name="is_parking" value="No"
                                                    class="form-check-input me-2"
                                                    {{ $visitor->is_parking == 'No' ? 'checked' : '' }}>
                                                <label for="parking_no">No</label>
                                            </div>
                                        </div>
                                        @error('parking')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g-3 parking-section">
                                    <!-- Vehicle Plate Number Input -->
                                    <div class="col-md-6">
                                        <label class="form-label">Vehicle Plate No</label>
                                        <input type="text"
                                            class="shadow-sm form-control @error('vehicle_plate_no') is-invalid @enderror"
                                            name="vehicle_plate_no"
                                            value="{{ $visitor->vehicle_plate_no ?? old('vehicle_plate_no') }}">
                                        @error('vehicle_plate_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Parking Slot Dropdown -->
                                    <div class="col-md-6">
                                        <label class="form-label">Parking Slot</label>
                                        <select
                                            class="shadow-sm form-select @error('parking_slot_id') is-invalid @enderror"
                                            name="parking_slot_id">
                                            <option value="">Select Parking Slot</option>
                                            @foreach ($parking_slots as $slot)
                                                <option value="{{ $slot->id }}"
                                                    {{ $visitor->parking_slot_id == $slot->id ? 'selected' : '' }}>
                                                    {{ $slot->slot_number }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parking_slot_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <h3>Status</h3>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label d-block text-start">Approved</label>
                                        <select name="approved" id="approved" class="shadow-sm form-select">
                                            <option value="No" {{ $visitor->approved_at == null ? 'selected' : '' }}>
                                                No</option>
                                            <option value="Yes" {{ $visitor->approved_at != null ? 'selected' : '' }}>
                                                Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-end">
                                    <button type="submit" class="p-1 px-3 btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- /.content-wrapper --> --}}
        @include('partials.footer')
    </div>
@endsection

@push('scripts')
    <script>

        $(document).ready(function() {

            // Initial toggle based on checkbox state
            toggleBadgeNumber();
            toggleEscortedName();

            // Event listeners
            $('#entry_pass_issued').change(function() {
                toggleBadgeNumber();
            });

            $('#is_escorted').change(function() {
                toggleEscortedName();
            });

            // Functions to toggle visibility
            function toggleBadgeNumber() {
                if ($('#entry_pass_issued').is(':checked')) {
                    $('.badge-number-div').show();
                } else {
                    $('.badge-number-div').hide();
                    $('input[name="badge_number"]').val('');
                }
            }

            function toggleEscortedName() {
                if ($('#is_escorted').is(':checked')) {
                    $('.entry-pass-div').show();
                } else {
                    $('.entry-pass-div').hide();
                    $('input[name="escorted_name"]').val('');
                }
            }

            // Function to toggle parking section
            function toggleParkingSection() {
                if ($('input[name="is_parking"]:checked').val() === 'Yes') {
                    $('.parking-section').show();
                } else {
                    $('.parking-section').hide();

                    // Reset the parking section fields to null
                    $('input[name="vehicle_plate_no"]').val('');
                    $('select[name="parking_slot_id"]').val('');
                }
            }

            // Initial check on page load
            toggleParkingSection();

            // Event listener for radio button change
            $('input[name="is_parking"]').on('change', function() {
                toggleParkingSection();
            });



            // Fetch designations when a company is selected
            $('#visitor_company_id').on('change', function() {
                let companyId = $(this).val();

                // Reset the designation dropdown
                $('#visitor_designation_id').empty().append('<option value="">Select Designation</option>');

                if (companyId) {
                    $.ajax({
                        url: `/company/${companyId}/designation/`, // Same URL logic as your backend
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Designations:', data
                                .designations); // Log the designations data
                            $.each(data.designations, function(index, designation) {
                                $('#visitor_designation_id').append(
                                    `<option value="${designation.id}">${designation.name}</option>`
                                );
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching designations:', error);
                        }
                    });
                }
            });



            // Fetch departments when a company is selected
            $('#host_company_id').on('change', function() {
                let companyId = $(this).val();

                // Reset lower dropdowns
                $('#host_department_id').empty().append('<option value="">Select Department</option>');
                $('#host_designation_id').empty().append('<option value="">Select Designation</option>');
                $('#host_id').empty().append('<option value="">Select Host</option>');

                if (companyId) {
                    $.ajax({
                        url: `/company/${companyId}/department`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {

                            $.each(data.departments, function(index, department) {
                                $('#host_department_id').append(
                                    `<option value="${department.id}">${department.name}</option>`
                                );
                            });

                            // After fetching departments, update the host dropdown (based on the company)
                            fetchHosts(companyId);
                        },
                        error: function(error) {
                            console.error('Error fetching departments:', error);
                        }
                    });
                }
            });

            // Fetch designations when a department is selected
            $('#host_department_id').on('change', function() {
                let departmentId = $(this).val();
                let companyId = $('#host_company_id').val();

                $('#host_designation_id').empty().append('<option value="">Select Designation</option>');
                $('#host_id').empty().append('<option value="">Select Host</option>');

                if (departmentId && companyId) {
                    $.ajax({
                        url: `/company/${companyId}/designation/${departmentId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {

                            $.each(data.designations, function(index, designation) {
                                $('#host_designation_id').append(
                                    `<option value="${designation.id}">${designation.name}</option>`
                                );
                            });

                            // Fetch hosts after department is selected
                            fetchHosts(companyId, departmentId);
                        },
                        error: function(error) {
                            console.error('Error fetching designations:', error);
                        }
                    });
                }
            });

            // Fetch hosts when a designation is selected
            $('#host_designation_id').on('change', function() {
                let companyId = $('#host_company_id').val();
                let departmentId = $('#host_department_id').val();
                let designationId = $(this).val();

                $('#host_id').empty().append('<option value="">Select Host</option>');

                if (designationId && departmentId && companyId) {
                    // Fetch hosts for the selected designation
                    $.ajax({
                        url: `/company/${companyId}/host/${departmentId}/${designationId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // console.log('Hosts:', data.hosts); // Log the hosts data
                            $.each(data.hosts, function(index, host) {
                                $('#host_id').append(
                                    `<option value="${host.id}">${host.name}</option>`
                                );
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching hosts:', error);
                        }
                    });
                }
            });

            // Function to fetch hosts based on company, department (optional), and designation (optional)
            function fetchHosts(companyId, departmentId = null, designationId = null) {
                $('#host_id').empty().append('<option value="">Select Host</option>');

                let url = `/company/${companyId}/host`; // Base URL for hosts

                // Append departmentId and designationId if available
                if (departmentId) {
                    url += `/${departmentId}`;
                }
                if (designationId) {
                    url += `/${designationId}`;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // console.log('Hosts:', data.hosts); // Log the hosts data
                        $.each(data.hosts, function(index, host) {
                            $('#host_id').append(
                                `<option value="${host.id}">${host.name}</option>`
                            );
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching hosts:', error);
                    }
                });
            }
        });
    </script>
@endpush
