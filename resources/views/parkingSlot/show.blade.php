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

        {{-- store field via ajax call --}}
        <div class="m-1 my-3 row card">
            <div class="col-12 card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Slots</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slots as $slot)
                                <tr>
                                    <td>{{ $slot['slot_name'] }}</td>
                                    <td class="">
                                        @if ($slot['status'] == 1)
                                            <span class="text-success">Occupied</span>
                                        @else
                                            <span class="text-danger">Unoccupied</span>
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
    @include('components.footer')
    </div>
    {{-- ========================== script ================================= --}}
    {{-- agar side panel dropdown arrow work nahi kare tou yahan script ka code try karo --}}
    @include('components.dash-script')
    {{-- search filter for table --}}

    {{-- ========================== script ================================= --}}
@endsection
