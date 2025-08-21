@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">


                        <!-- Tab Navigation -->
                        <ul class="mb-3 nav nav-tabs" id="formTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-toggle="tab" data-target="#personal"
                                    type="button" role="tab">Personal
                                    Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="visit-tab" data-toggle="tab" data-target="#visit"
                                    type="button" role="tab">Visit
                                    Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="security-tab" data-toggle="tab" data-target="#security"
                                    type="button" role="tab">Security
                                    Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="logs-tab" data-toggle="tab" data-target="#logs" type="button"
                                    role="tab">logs</button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="p-4 shadow-sm tab-content card">

                            <!-- Personal Info Tab -->
                            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                                <div class="row g-3">
                                    <table class="table mt-3 table-bordered">
                                        <tr>
                                            <th class="text-secondary">Name:</th>
                                            <td class="text-secondary">{{ $visitor->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Company Name:</th>
                                            <td class="text-secondary">{{ $visitor->company_name ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Phone:</th>
                                            <td class="text-secondary">{{ $visitor->phone }}</td>
                                        </tr>

                                    </table>

                                </div>
                                <div class="mt-4 text-end">
                                </div>
                            </div>

                            <!-- Visit Details Tab -->
                            <div class="tab-pane fade" id="visit" role="tabpanel">
                                <div class="row g-3">
                                    <table class="table mt-3 table-bordered">
                                        <tr>
                                            <th class="text-secondary">Vehicle Plate Number:</th>
                                            <td class="text-secondary">{{ $visitor->vehicle_plate_no ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Parking Slot:</th>
                                            <td class="text-secondary">{{ $visitor->parkingSlot->slot_number ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Items Carried:</th>
                                            <td class="text-secondary">
                                                {{ $visitor->item_carried ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Purpose of Visit:</th>
                                            <td class="text-secondary">{{ $visitor->reason }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Host:</th>
                                            <td class="text-secondary">{{ $visitor->host->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Entered Time:</th>
                                            <td class="text-secondary">
                                                {{ Carbon\Carbon::parse($visitor->time_of_arrival)->format('h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Exit Time:</th>
                                            <td class="text-secondary">
                                                {{ $visitor->time_of_departure ? Carbon\Carbon::parse($visitor->time_of_departure)->format('h:i A') : 'No exit time' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-secondary">Status:</th>
                                            <td class="text-secondary">{{ $visitor->status }}</td>
                                        </tr>



                                    </table>

                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                </div>
                            </div>

                            <!-- Security Info Tab -->
                            <div class="tab-pane fade" id="security" role="tabpanel">
                                <div class="row g-3">
                                    <table class="table mt-3 table-bordered">
                                        <tr>
                                            <th class="text-secondary">Entry Pass Issued:</th>
                                            <td class="text-secondary">{{ $visitor->entry_pass_issued }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Access Card/Badge Number:</th>
                                            <td class="text-secondary">{{ $visitor->badge_number ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">Escorted:</th>
                                            <td class="text-secondary">{{ $visitor->is_escorted }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">ID Type:</th>
                                            <td class="text-secondary">{{ $visitor->id_type }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary">ID Number:</th>
                                            <td class="text-secondary">{{ $visitor->id_number }}</td>
                                        </tr>

                                    </table>



                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                </div>
                            </div>

                            <!-- logs Tab -->
                            <div class="tab-pane fade" id="logs" role="tabpanel">
                                <div class="row g-3">
                                    <table class="table mt-3 table-bordered">
                                        <tr>
                                            <th class="text-secondary">user</th>
                                            <th class="text-secondary">Activity</th>
                                        </tr>

                                        @foreach ($visitor->logs as $log)
                                            <tr>
                                                <td>{{ $log->user->name ?? '' }}</td>
                                                <td>{{ $log->message }}</td>
                                            </tr>
                                        @endforeach
                                    </table>

                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- /.content-wrapper --> --}}
        @include('partials.footer')
    </div>
    {{-- ========================== script ================================= --}}
    {{-- agar side panel dropdown arrow work nahi kare tou yahan script ka code try karo --}}
    @include('components.dash-script')
    {{-- search filter for table --}}


    {{-- ========================== script ================================= --}}
@endsection
