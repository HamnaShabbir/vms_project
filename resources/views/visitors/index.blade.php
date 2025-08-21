@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">
                        <div class="row">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title text-secondary fw-bold">Visitors </h5>
                                <div class="d-flex">

                                    @if (auth()->user()->role == 'Host' || auth()->user()->role == 'host')
                                        <button id="generateLinkButton" class="mx-1 btn btn-secondary btn-sm">
                                            <i class="fa fa-link" aria-hidden="true"></i> Generate Public Link
                                        </button>
                                        <input type="text" id="publicLink"
                                            style="opacity: 0; position: absolute; top: -9999px;">
                                    @endif
                                    @if (auth()->user()->role != 'Host' && auth()->user()->role != 'host')
                                        <a class="p-1 btn btn-primary btn-sm" href="{{ route('visitors.create') }}">
                                            <i class="fas fa-plus"></i> Create
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>


                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <style>
                            #visitorTable tbody tr {
                                transition: all 0.2s ease-in-out;
                            }
                        </style>
                        <div class="d-flex justify-content-end">
                            <input type="text" id="searchInput" class="mb-3 form-control w-25"
                                placeholder="Search in Visitors Table...">
                        </div>
                        @include('visitors.table')

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
@push('scripts')
    {{-- ========================== script ================================= --}}
    {{-- agar side panel dropdown arrow work nahi kare tou yahan script ka code try karo --}}
    @include('components.dash-script')
    {{-- search filter for table --}}
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase(); // Get search input
            var rows = document.querySelectorAll('#visitorTable tbody tr'); // All table rows

            rows.forEach(function(row) {
                var rowText = row.innerText.toLowerCase(); // Get text of entire row

                // Check if row contains search query
                if (rowText.indexOf(input) > -1) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        });
    </script>
    {{-- for timeIn and timeOut --}}
    <script>
        // Function to set current time on button click
        function setTimeIn(button) {
            var now = new Date().toLocaleTimeString();
            button.innerText = now;
            button.classList.remove('btn-success');
            button.classList.add('btn-secondary');
        }

        function setTimeOut(button) {
            var now = new Date().toLocaleTimeString();
            button.innerText = now;
            button.classList.remove('btn-danger');
            button.classList.add('btn-secondary');
        }
    </script>

    {{-- ========================== script ================================= --}}
    {{-- ========================== script ================================= --}}
    <script>
        $(document).ready(function() {
            $('#generateLinkButton').on('click', function() {
                var companyId = '{{ auth()->user()->company_id }}'; // Get company ID dynamically
                var hostId = '{{ auth()->user()->id }}'; // Get host ID dynamically

                // Get the current timestamp and format it properly
                var expiryTime = encodeURIComponent(
                    "{{ now()->format('Y-m-d_H:i:s') }}"); // Use underscores instead of spaces

                // Generate the public link
                var publicLink = "{{ config('app.url') }}" + '/public-form/' + companyId + '/' +
                    expiryTime + '/' +
                    hostId;

                // Set the value of the hidden input field to the public link
                $('#publicLink').val(publicLink);

                // Select and copy the link to the clipboard
                $('#publicLink')[0].select();
                document.execCommand('copy');

                // Alert the user that the link has been copied
                alert('Public link copied to clipboard!');
            });
        })
    </script>
@endpush
