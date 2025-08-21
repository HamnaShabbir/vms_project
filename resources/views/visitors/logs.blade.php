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
                                <h5 class="card-title text-secondary fw-bold">System Logs</h5>

                            </div>

                        </div>
                        <hr>
                        {{-- yahan table --}}
                        {{-- table --}}
                        <div class="mt-4 table-responsive">
                            <table class="table mt-3 table-bordered">
                                <tr>
                                    <th class="text-secondary">Receptionist</th>
                                    <th class="text-secondary">Activity</th>
                                    <th>Date/Time</th>
                                </tr>

                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->visitor->name ?? '' }}</td>
                                        <td>{{ $log->message }}</td>
                                        <td>{{ $log->created_at }}</td>
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

    {{-- Footer Section --}}
    {{-- @include('partials.footer') --}}
    {{-- ========================== script ================================= --}}
    {{-- agar side panel dropdown arrow work nahi kare tou yahan script ka code try karo --}}
    @include('components.dash-script')
    {{-- search filter for table --}}

    {{-- ========================== script ================================= --}}
@endsection
