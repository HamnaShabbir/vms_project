@extends('layouts.master')

@section('main_content')
    <div class="container-fluid ">

        <!-- content -->
        <!-- breadcrumb -->

        <div class="pb-4 m-1 mb-3 row ">
            <div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="page-header breadcrumb-header ">
                    <div class="py-3">
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="flex-wrap d-flex align-items-center">
                                <div>
                                    <h4 class="mt-3 ml-1 text-secondary fw-bold">Good Moring
                                        {{ auth()->user()->name ?? 'Host' }}!</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="page-header breadcrumb-header ">
                    <div class="py-3">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-wrap d-flex align-items-center">
                                <div id="currentTime" class="me-3 fw-bold text-secondary"></div>
                                {{-- <button class="p-1 px-2 mt-1 mr-2 btn btn-sm create">Clock In</button> --}}
                                @if (auth()->user()->role == 'host')
                                    <button id="generateLinkButton" class="mx-1 btn btn-secondary btn-sm">
                                        <i class="mr-1 fas fa-link "></i> Generate Public Link
                                    </button>
                                    <input type="text" id="publicLink"
                                        style="opacity: 0; position: absolute; top: -9999px;">
                                @endif
                                <div class="w-100">
                                    {{-- <i class="ml-3 fas fa-link "></i><p id="formLink" class="mt-2 mb-0 ml-3"></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- yahan cards show ho rahe hain -->
        <div class="m-1 mb-2 row">
            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY">
                    <i class="fas fa-calendar-check b-first" aria-hidden="true"></i> <!-- Scheduled Appointments -->
                    <span class="text-secondary">Inhouse Visitors</span>
                    <span class="text-secondary">{{ $totalInhouseVisitors }}</span>
                    <p class="mt-3 mb-1 text-center">
                        <i class="mr-1 fas fa-wallet c-first"></i>Your main list is growing
                    </p>
                </div>
            </div>

            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY">
                    <i class="fas fa-bell b-second" aria-hidden="true"></i> <!-- Pending Approvals -->
                    <span class="text-secondary">Pending Approvals</span>
                    <span class="text-secondary">{{ $totalVisitorsPending }}</span>
                    <p class="mt-3 mb-1 text-center">
                        <i class="mr-1 fas fa-wifi c-second"></i>Something goes here
                    </p>
                </div>
            </div>

            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY">
                    <i class="fas fa-users b-forth" aria-hidden="true"></i> <!-- Total Visitors -->
                    <span class="text-secondary">Total Visitors</span>
                    <span class="text-secondary">{{ $totalVisitorsToday }}</span>
                    <p class="mt-3 mb-1 text-center">
                        <i class="mr-1 fas fa-bluetooth-b c-forth"></i>Something goes here
                    </p>
                </div>
            </div>

            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY">
                    <i class="fas fa-user-times b-forth" aria-hidden="true"></i> <!-- Denied Visitors -->
                    <span class="text-secondary">Denied Visitors</span>
                    <span class="text-secondary">{{ $totalVisitorsRejected }}</span>
                    <p class="mt-3 mb-1 text-center">
                        <i class="mr-1 fas fa-bluetooth-b c-forth"></i>Something goes here
                    </p>
                </div>
            </div>
        </div>

        {{-- approved visitors --}}
        <div class="mx-1 row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <style>
                            #visitorTable tbody tr {
                                transition: all 0.2s ease-in-out;
                            }
                        </style>
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bold text-secondary">Visitors Details</h4>
                            <input type="text" id="searchInput" class="mb-3 form-control"
                                placeholder="Search in Approved Visitors...">
                        </div>
                        <div class="mt-4 table-responsive">
                            @include('visitors.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- graph view --}}
        <div class="m-1 row">
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Graphs View</h5>

                        <!-- Display Total Slots Count -->
                        <h6 class="text-center">Total Slots: <span id="totalSlots">100</span></h6>

                        <!-- Wrapper to ensure proper fit -->
                        <div style="width: 100%;">
                            <canvas id="parkingChart" style="width: 100%; padding-bottom: 20px;"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            // Example data (Replace these with dynamic values from your backend)
                            var occupiedSlots = 60;
                            var availableSlots = 40;
                            var totalSlots = occupiedSlots + availableSlots;

                            // Update Total Slots Display
                            document.getElementById("totalSlots").textContent = totalSlots;

                            // Parking Chart
                            var ctxParking = document.getElementById('parkingChart').getContext('2d');
                            var parkingChart = new Chart(ctxParking, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Occupied Slots', 'Available Slots'],
                                    datasets: [{
                                        label: 'Parking Slots Overview',
                                        data: [occupiedSlots, availableSlots], // Dynamic Data
                                        backgroundColor: [
                                            '#ff4d4d', // Red for Occupied
                                            '#28a745'  // Green for Available
                                        ],
                                        hoverOffset: 10
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                            labels: {
                                                boxWidth: 15
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                        <hr class="hr-dashed">
                    </div>
                </div>
            </div>
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-8">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">Linear View</h5>
                        <hr>
                        <canvas id="checkinCheckoutTrend" width="400" height="auto"></canvas>
                        <hr class="hr-dashed">
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById('checkinCheckoutTrend').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line', // Linear Chart
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // X-Axis Labels
                        datasets: [{
                            label: 'Check-ins',
                            data: [12, 19, 3, 5, 2, 3], // Y-Axis Data
                            borderColor: '#00B98E', // Line Color
                            borderWidth: 2,
                            fill: false,
                            pointBackgroundColor: '#00B98E', // Point Color
                            tension: 0.4 // Smoothness of the curve
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
            </script>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('generateLinkButton').addEventListener('click', function() {
        var companyId = '{{ auth()->user()->company_id ?? 'default-company' }}'; // Use a default value
        var hostId = '{{ auth()->user()->id }}'; // Get host ID dynamically

        if (!companyId) {
            alert('Error: Company ID is missing!');
            return;
        }

        // Get current timestamp and replace ':' with '-'
        var expiryTime = new Date().toISOString().replace(/T/, '_').replace(/:/g, '-').split('.')[0];

        // Generate the public link correctly
        var publicLink = "{{ config('app.url') }}" + "/public-form/" + companyId + "/" + expiryTime + "/" + hostId;

        // Set the value of the hidden input field
        var linkInput = document.getElementById('publicLink');
        linkInput.value = publicLink;

        // Copy link to clipboard
        linkInput.select();
        document.execCommand('copy');

        alert('Public link copied to clipboard!');
    });

    </script>
@endpush
