 <!-- Company Input Modal -->
 <div class="modal fade" id="companyModal{{ $type->id }}" tabindex="-1"
    aria-labelledby="companyModal{{ $type->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="pb-3 text-white modal-header" style="background-color: #950606;">
                <h5 class="modal-title" id="companyModal{{ $type->id }}Label">Edit
                    Id Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('IdType.update',$type->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $type->name }}"
                                class="shadow-sm form-control" required>

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
    {{-- <!-- /.content-wrapper --> --}}
    {{-- @include('partials.footer') --}}
</div>
