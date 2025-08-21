<div class="modal fade" id="statusModal{{ $status->id }}" tabindex="-1"
aria-labelledby="statusModal{{ $status->id }}Label" aria-hidden="true">
<div class="modal-dialog modal-xl custom-modal-width"
    style="max-width: 50% !important;">
    <div class="modal-content">
        <div class="pb-3 text-white modal-header d-flex align-item-center"
            style="background-color: #950606">
            <h5 class="modal-title" id="statusModal{{ $status->id }}Label">Edit Parking Status
            </h5>
            <button type="button" class="mt-1 btn-close"
                data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- for check success or error message --}}
            {{-- @include('components.messages') --}}
            {{-- Success and Error Messages when form fill --}}
            <form id="statusForm" class="p-2" method="POST" action="{{ route('parkingStatus.update',$status->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="statusName" class="form-label">Name
                            *</label>
                        <input type="text" id="statusName" name="name" value="{{ $status->name }}"
                            class="form-control"
                            placeholder="Enter Status Name" required>
                    </div>

                    <div class="mb-3 col-md-2">
                        <label for="statusColour" class="form-label">Colour
                            *</label>
                        <input type="color" id="statusColour" value="{{ $status->color }}"
                            name="color"
                            class="form-control form-control-color w-100"
                            value="#000000" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                id="isActive" name="is_active" value="1"
                                {{ $status->is_active == 1 ? 'checked' : '' }}>

                            <label class="form-check-label"
                                for="isActive">Is Active</label>
                        </div>
                    </div>
                </div>

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
