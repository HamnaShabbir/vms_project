@extends('layouts.master')


@section('main_content')
    <div class="container-fluid">
        {{-- store field via ajax call --}}
        <form action="{{ route('parkingSlot.store') }}" method="Post">
            @csrf
            <div class="m-1 row">
                <div class="col-md-3">
                    <label for="company" class="form-label">Prefix</label>
                    <input type="text" class="form-control " name="prefix">
                </div>
                <div class="col-md-3">
                    <label for="slot" class="form-label">No of Slot</label>
                    <input type="number" class="form-control" id="total_slots" name="total_slots"
                        placeholder="Enter total slots number">
                </div>
                <div class="col-md-3">
                    <br>
                    <button class="p-1 mt-2 px-2 btn btn-primary" id="addSlotBtn">Create</button>
                </div>
            </div>
        </form>
        {{-- store field via ajax call --}}
        <div class="m-1 my-3 row card">
            <div class="col-12 card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Slots</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slots as $slot)
                                <tr>

                                    <td> {{ $slot->slot_number }}</td>
                                    <td class="">
                                        <div class="gap-1 d-flex align-items-center">




                                            <form action="{{ route('parkingSlot.destroy', $slot->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');" class="p-0 m-0 d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="cursor-pointer fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
