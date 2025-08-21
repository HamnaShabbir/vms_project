<x-app-layout>
    @include('components.dashboard-header')

    <div class="container mt-4">
        <h4 class="text-light fw-bold py-3 pl-1" style="background-color: #950606">
            <i class="fas fa-edit"></i> Edit Parking Slot
        </h4>

        <form action="{{ route('parking-slot.update', $slot->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label text-secondary">Company Name</label>
                <input type="text" name="company_name" value="{{ $slot->company_name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-secondary">Slot Number</label>
                <input type="number" name="slot_number" value="{{ $slot->slot_number }}" class="form-control" required>
            </div>

            <div class="row d-flex align-items-center justify-content-start">
                <button type="submit" class="btn btn-sm p-1 create ml-3" style="width: 120px;">Update Slot</button>
                <a href="{{ route('parking-slot.index') }}" class="btn btn-sm p-1 ml-2 create" style="width: 120px;">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
