@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title text-secondary fw-bold">Parking Management</h5>

                            </div>

                        </div>
                        <hr>
                        {{-- yahan table --}}
                        {{-- table --}}
                        <div class="mt-4 table-responsive">
                            <table class="table mt-3 table-bordered">
                                <thead>
                                    <tr>
                                        <th>Slot</th>
                                        <th>Status</th>
                                        <th>Company</th>
                                        <th>Visitor</th>
                                        <th>Host</th>
                                        <th>Vehicle</th>
                                        <th>Entry Time</th>
                                        <th>Exit Time</th>
                                        <th>Duration</th>
                                        <th class="text-center">View Visitor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parkings as $slot)
                                        <tr>
                                            <td>{{ $slot->slot_number }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <i
                                                            class="fa fa-circle {{ $slot->status == 'Unoccupied' ? 'text-success' : 'text-danger' }}"></i>
                                                    </div>
                                                    <div class="">{{ $slot->status }}</div>
                                                </div>
                                            </td>
                                            <td>{{ $slot->visitor->company_name ?? 'N/A' }}</td>
                                            <td>{{ $slot->visitor->name ?? 'N/A' }}</td>
                                            <td>{{ $slot->visitor->host->name ?? 'N/A' }}</td>
                                            <td>{{ $slot->visitor->vehicle_plate_no ?? 'N/A' }}</td>
                                            <td>
                                                @if ($slot->visitor?->time_of_arrival)
                                                    {{ Carbon\Carbon::parse($slot->visitor->time_of_arrival)->format('h:i A') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if ($slot->visitor?->time_of_departure)
                                                    {{ Carbon\Carbon::parse($slot->visitor->time_of_departure)->format('h:i A') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $slot->visitor->duration ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                @if ($slot->visitor)
                                                    <a href="{{ route('visitors.show', $slot->visitor->id) }}"
                                                        class="btn btn-success btn-xs">
                                                        <i class="cursor-pointer fas fa-eye "></i>
                                                    </a>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    {{-- ========================== script ================================= --}}
    {{-- agar side panel dropdown arrow work nahi kare tou yahan script ka code try karo --}}
    @include('components.dash-script')
    {{-- search filter for table --}}

    {{-- ========================== script ================================= --}}
@endsection
