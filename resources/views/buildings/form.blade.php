@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh table wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="row">

                            <h5 class="card-title text-secondary fw-bold">Building Setting</h5>
                            <hr>
                        </div>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <form action="{{ route('buildings.store', $building->id ?? null) }}" method="POST" enctype="multipart/form-data" class="p-2">

                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-12">Logo </label>
                                        <input type="file" class="dropify" id="logo{{ $building->id }}" name="logo"
                                            data-allowed-file-extensions="png jpg jpeg svg bmp" data-height="119" autocomplete="off"
                                            @if ($building->logo) data-default-file="{{ $building->logo_url }}" @endif>


                                </div>
                                <!-- Building Name -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $building->name ?? '' }}"
                                        class="form-control" placeholder="Enter Building Name" required>
                                </div>

                                <!-- Address -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="{{ $building->address ?? '' }}"
                                        class="form-control" placeholder="Enter Address" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="Email">Email</label>
                                    <input type="email" name="email" value="{{ $building->email ?? '' }}"
                                        class="form-control" placeholder="Enter Email" required>
                                </div>

                                <!-- Phone Number -->
                                <div class="mb-3 col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="phone_number" value="{{ $building->phone_number ?? '' }}"
                                        class="form-control" placeholder="Enter Phone Number" required>
                                </div>
                            </div>

                            <!-- Building Logo Upload -->
                            {{-- <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <input type="file" name="logo" class="form-control">
                                            </div>
                                        </div> --}}

                            <!-- Submit Button -->
                            <div class="mt-4 text-end">
                                <button type="submit" class="p-1 shadow btn btn-primary btn-sm ">
                                    <i class="pr-1 fas fa-save"></i> Save
                                </button>
                            </div>
                        </form>




                        <hr>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        $('.dropify').dropify();
    });
</script>
@endpush
