@extends('layouts.master')

@section('main_content')
    <style>
        .card-title {
            float: none;
        }
    </style>
    <div class="container-fluid ">

        <!-- content -->
        <!-- breadcrumb -->

        <div class="pb-4 m-1 mb-3 row ">
            <div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="page-header breadcrumb-header ">
                    <div class="row align-items-end ">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- yahan cards show ho rahe hain -->
        <div class="m-1 mb-2 row">
            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY "><i class="fas fa-users b-first"
                        aria-hidden="true"></i>
                    <span class="text-secondary">Total Users </span>
                    <span class="text-secondary">{{ $usersCount }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="mr-1 fas fa-user c-first"></i>Your main
                        list is
                        growing</p>
                </div>
            </div>
            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY "><i class="fas fa-building b-second"
                        aria-hidden="true"></i>
                    <span class="text-secondary">Reg Companies</span>
                    <span class="text-secondary">{{ $companiesCount }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="mr-1 far fas fa-wifi c-second"></i>Something
                        goes here</p>
                </div>
            </div>
            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY "><i class="fas fa-eye b-third"
                        aria-hidden="true"></i>
                    <span class="text-secondary">Live Receptionist </span>
                    <span class="text-secondary">{{ $totalReceptionist }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="mr-1 fab fa-whatsapp c-third"></i>Something
                        goes here</p>
                </div>
            </div>
            <div class="p-2 col-xl-3 col-md-6 col-sm-6">
                <div class="box-card mini animate__animated animate__flipInY "><i class="mr-1 fas fa-parking  b-forth"
                        aria-hidden="true"></i>
                    <span class="text-secondary">Total Parking Slot</span>
                    <span class="text-secondary">{{ $pendingVisitorRequests }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="mr-1 fab fa-bluetooth c-forth"></i>today's pending visitors
                        requests</p>
                </div>
            </div>
        </div>
        <!-- alert message hai -->
        {{-- <div class="m-2 mb-1 row">
						<div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="alert alert-third alert-shade alert-dismissible fade show" role="alert">
								<strong>alert-third!</strong> You should check in on some of those fields below.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
					</div> --}}


        <div class="m-1 row">
            {{-- clock --}}
            <div class="p-2 col-xl-4 col-md-6 col-sm-6">
                <div class="mb-3 box-card flat f-main animate__animated animate__flipInY" style="height: 150px">
                    <iframe
                        src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FKarachi"
                        width="100%" height="115" frameborder="0" seamless></iframe>
                </div>

                {{-- list of companies --}}
                <div class="card shade">
                    <div class="card-body">
                        <h5 class="card-title">List of Companies</h5>
                        <hr>
                        <!-- Scrollable Table Wrapper -->
                        <div class="table-responsive" style="max-height: 130px; overflow-y: auto;">
                            <table class="table table-striped">
                                <thead class="bg-white sticky-top">
                                    <tr>
                                        <th class="fw-bold text-secondary" style="font-size: 12px">Company Name</th>
                                        <th class="fw-bold text-secondary" style="font-size: 12px">Hosts</th>
                                        <th class="fw-bold text-secondary" style="font-size: 12px">Company Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $company->company_name }}</td>
                                            <td>{{ $company->users->count() }}</td>
                                            <td>{{ $company->admin->name ?? '-' }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>

            <!-- yeh table wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-8 col-lg-8">
                <div class="card shade">
                    <div class="card-body">
                        <h5 class="card-title">User Management</h5>
                        <hr>
                        <!-- Scrollable Table Container with Fixed Height -->
                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-striped">
                                <thead class="bg-white sticky-top">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Company</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->index }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->company->company_name ?? '-' }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <div class="m-1 row">
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100 p-5">
                    <h5 class="card-title">Graph View</h5>
                    <hr>
                    <div class="card-body p-5">
                        <div class="p-5">
                            <canvas id="myChart2"></canvas>
                        </div>
                        <hr class="hr-dashed">
                        {{-- <p class="text-center c-danger">Example of bar chart</p> --}}
                    </div>

                </div>
            </div>

            {{-- <div class="p-2 col-xs-1 col-sm-1 col-md-4 col-lg-4">
							<div class="card flat f-first h-100">
								<div class="card-body">
									<h5 class="card-title">Weather Widget</h5>

									<hr>
									<a class="weatherwidget-io" href="https://forecast7.com/en/37d5545d08/urmia/"
										data-label_1="URMIA" data-label_2="WEATHER" data-icons="Climacons Animated"
										data-days="5" data-textcolor="#fafafaad"></a>


								</div>

							</div>
						</div> --}}
        </div>
    </div>
    
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
        var url = "{{ route('userRoleCounts') }}";
        fetch(url)
            .then(response => response.json())
            .then(data => {
                var labels = Object.keys(data); // Get role names
                var counts = Object.values(data); // Get role counts

                var ctx = document.getElementById('myChart2');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'User Count',
                            data: counts,
                            backgroundColor: [
                                '#66b3ff', // Soft Blue
                                '#99ff99', // Soft Green
                                '#ffcc99', // Soft Peach
                                '#ffb3e6', // Soft Lavender
                                '#ff6666', // Soft Red
                                '#c2c2ff', // Light Purple
                                '#ff9966', // Soft Orange
                                '#80e0a7' // Mint Green
                            ]
                        }]
                    },
                    options: {}
                });
            });
    </script>
@endpush
