<div class="modal fade" id="companyModal{{ $designation->id }}" tabindex="-1"
    aria-labelledby="companyModal{{ $designation->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="pb-3 text-white modal-header" style="background-color: #950606;">
                <h5 class="modal-title" id="companyModalLabel">Add
                    Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('designations.store') }}">
                    @csrf
                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="shadow-sm form-control"
                                placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <select name="department_id" id="" class="form-control">
                                <option value="">Select Department
                                </option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">
                                        {{ $department->name }}</option>
                                @endforeach

                            </select>
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
    @include('components.footer')
</div>
</div>
