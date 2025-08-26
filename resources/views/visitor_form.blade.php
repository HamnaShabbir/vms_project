<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.css')
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

    <!-- Tagify JS -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
</head>

<body style="height:100vh;">
    <div class="container m-auto">
        <div class="p-4 shadow card">
            <h2 class="mb-3 text-secondary">Visitor Form</h2>
            @include('components.messages')
            <form action="{{ route('visitors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tab Content -->
                <div class="p-4 shadow-sm tab-content card">

                    <!-- Visitors Details -->
                    <hr>
                    <h3>Visitor Details</h3>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="shadow-sm form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="shadow-sm form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="company_id" value="{{ auth()->user()->company_id ?? '' }}">
                        <div class="col-md-6">
                            <label class="form-label">Company/Organization <span class="text-danger">*</span></label>
                            <input type="text" name="company_name" id="company_name"
                                class="shadow-sm form-control @error('company_name') is-invalid @enderror"
                                value="{{ old('company_name') }}">
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <input type="text" name="department_name" id="department_name"
                                class="shadow-sm form-control @error('department_name') is-invalid @enderror"
                                value="{{ old('department_name') }}">
                            @error('department_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation_name" id="designation_name"
                                class="shadow-sm form-control @error('designation_name') is-invalid @enderror"
                                value="{{ old('designation_name') }}">
                            @error('designation_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Purpose of Visit</label>
                            <input type="text" class="shadow-sm form-control @error('reason') is-invalid @enderror"
                                name="reason" value="{{ old('reason') }}">
                            @error('reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="shadow-sm form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ID Type</label>
                            <select class="shadow-sm form-select @error('id_type') is-invalid @enderror" name="id_type">
                                <option value="">Select</option>
                                @foreach ($IdTypes as $type)
                                    <option value="CNIC" {{ old('id_type') == $type->name ? 'selected' : '' }}>
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
                                class="shadow-sm form-control @error('id_number') is-invalid @enderror" name="id_number"
                                value="{{ old('id_number') }}">
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
                                value="{{ old('date_of_visit', \Carbon\Carbon::now('Asia/Karachi')->format('Y-m-d')) }}">
                            @error('date_of_visit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Time of Arrival -->
                        <div class="col-md-6">
                            <label class="form-label">Time of Arrival <span class="text-danger">*</span></label>
                            <input type="time" name="time_of_arrival"
                                class="shadow-sm form-control @error('time_of_arrival') is-invalid @enderror"
                                value="{{ old('time_of_arrival', \Carbon\Carbon::now('Asia/Karachi')->format('H:i')) }}">
                            @error('time_of_arrival')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Items Carried (Multi-selector) -->
                        <div class="col-md-12">
                            <label class="form-label">Items Carried</label>
                            <input type="text" name="item_carried" id="item_carried"
                                class="shadow-sm form-control" value="{{ old('item_carried') }}">
                        </div>

                    </div>
                    <hr>
                    <input type="hidden" name="host_id" value="{{ $hostId }}">
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
                                        {{ old('parking', 'Yes') == 'Yes' ? 'checked' : '' }}>
                                    <label for="parking_yes">Yes</label>
                                </div>
                                <!-- No Option -->
                                <div class="ml-3">
                                    <input type="radio" id="parking_no" name="is_parking" value="No"
                                        class="form-check-input me-2"
                                        {{ old('parking', 'Yes') == 'No' ? 'checked' : '' }}>
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
                                name="vehicle_plate_no" value="{{ old('vehicle_plate_no') }}">
                            @error('vehicle_plate_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="p-1 px-3 btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Success message -->
    <div id="success-message" class="mt-3 text-center text-white alert fs-2 fw-bold bg-dark" style="display: none;">
        Form submitted to the host successfully!
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
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
    @include('partials.script')
</body>

</html>
