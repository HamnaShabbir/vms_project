@extends('layouts.master')


@section('main_content')
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <div class="card shade h-100">
        <div class="card-body ">
            <div class="row">
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="card-title text-secondary fw-bold">Profile settings</h5>


                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="p-3 bg-gray-100 mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 my-2 sm:p-8 bg-white shadow rounded-3">
                <div class="max-w-xl">
                    <div class="row">
                        <div class="col-12">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 my-2 sm:p-8 bg-white shadow rounded-3">
                <div class="max-w-xl">
                    <div class="row">
                        <div class="col-12">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user()->role != 'Super Admin')
                <div class="p-4 my-2 sm:p-8 bg-white shadow rounded-3">
                    <div class="max-w-xl">
                        <div class="row">
                            <div class="col-12">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        {{-- @include('components.footer') --}}
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();

            // Detect when an image is removed
            $('.dropify').on('dropify.beforeClear', function(event, element) {
                $('input[name="existing_profile_picture"]').val(''); // Clear existing image field
            });
        });
    </script>
@endpush
