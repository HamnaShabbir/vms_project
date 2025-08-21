 <!-- Company Input Modal -->
 <div class="modal fade" id="companyModal{{ $department->id }}" tabindex="-1"
     aria-labelledby="companyModal{{ $department->id }}Label" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="pb-3 text-white modal-header" style="background-color: #950606;">
                 <h5 class="modal-title" id="companyModal{{ $department->id }}Label">Edit
                     Department</h5>
                 {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>

             <div class="modal-body">
                 <form method="POST" action="{{ route('departments.update',$department->id) }}">
                     @csrf
                     @method('PUT')
                     <div class="row g-3">
                         <!-- Name -->
                         <div class="col-md-12">
                             <label class="form-label">Name</label>
                             <input type="text" name="name" value="{{ $department->name }}"
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
 </div>
