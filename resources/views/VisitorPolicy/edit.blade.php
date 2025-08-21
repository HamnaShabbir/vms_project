<div class="modal fade" id="companyModal{{ $policy->id }}" tabindex="-1"
    aria-labelledby="companyModal{{ $policy->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl custom-modal-width" style=" max-width: 50% !important;">
        <div class="modal-content">
            <div class="pb-3 text-white modal-header d-flex align-item-center" style="background-color: #950606">
                <h5 class="modal-title" id="companyModal{{ $policy->id }}Label">Add Visitor
                    Policies</h5>
                <button type="button" class="mt-1 btn-close" style="color: white" data-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('visitor-policy.update', $policy->id) }}" method="POST"
                    enctype="multipart/form-data" class="p-2">
                    @csrf
                    @method('PUT')

                    <!-- Title Input -->
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" required
                            value="{{ $policy->title }}">
                    </div>

                    <!-- Description Input -->
                    <div class="mb-3">
                        <input type="text" name="description" class="form-control" value="{{ $policy->description }}"
                            placeholder="Enter Description" required>
                    </div>

                    <!-- File Attachment Input -->
                    <div class="mb-3">


                        <!-- File Upload Input -->
                        <input type="file" name="attachment" class="form-control">
                        @if (!empty($policy->attachment))
                            <div class="mb-2">
                                <a href="{{ asset('uploads/' . $policy->attachment) }}" download>Download Existing
                                    File</a>
                            </div>
                        @endif

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
