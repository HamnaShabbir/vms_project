@extends('layouts.master')

@section('main_content')
<div class="pb-4 m-1 row ">
    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
        <div class="box-card mini animate__animated animate__flipInY "><i
                class="fab far fa-user b-first" aria-hidden="true"></i>
            <span class="text-secondary">Total Hosts</span>
            <span class="text-secondary">{{ $totalHosts }}</span>
            <p class="mt-3 mb-1 text-center"><i class="mr-1 far fas fa-wallet c-first"></i>Your main
                list is
                growing</p>
        </div>
    </div>
    <div class="p-2 col-xl-3 col-md-6 col-sm-6">
        <div class="box-card mini animate__animated animate__flipInY "><i
                class="fab far fa-bell b-second" aria-hidden="true"></i>
            <span class="text-secondary">Total Receptionist</span>
            <span class="text-secondary">{{ $totalVisitorsToday }}</span>
            <p class="mt-3 mb-1 text-center"><i class="mr-1 far fas fa-wifi c-second"></i>Something
                goes here</p>
        </div>
    </div>
    <div class="p-2 col-xl-3 col-md-6 col-sm-6">
        <div class="box-card mini animate__animated animate__flipInY "><i
                class="fab fas fa-users b-third" aria-hidden="true"></i>
            <span class="text-secondary">Pending Visitors</span>
            <span class="text-secondary">{{ $totalVisitorsPending }}</span>
            <p class="mt-3 mb-1 text-center"><i class="mr-1 fab fa-whatsapp c-third"></i>Something
                goes here</p>
        </div>
    </div>
    <div class="p-2 col-xl-3 col-md-6 col-sm-6">
        <div class="box-card mini animate__animated animate__flipInY "><i
                class="fab far fa-clock b-forth" aria-hidden="true"></i>
            <span class="text-secondary">Total Visitor</span>
            <span class="text-secondary">{{ $totalInhouseVisitors }}</span>
            <p class="mt-3 mb-1 text-center"><i class="mr-1 fab fa-bluetooth c-forth"></i>Something
                goes here</p>
        </div>
    </div>
</div>
<div class="m-1 row">
    <!-- Table Section -->
    <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
        <div class="card shade h-100">
            <div class="card-body">
                <h5 class="card-title">Visitors</h5>
                <hr>
                @include('visitors.table')
            </div>
        </div>
    </div>
</div>


<div class="m-0 row">
    <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
        <div class="card" style="border-radius: 3px">
            <div class="card-body">
                <h5 class="card-title">Hosts Details</h5>
                <hr>
                <table class="table text-center table-bordered">
                    <thead class="table-light text-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>

                        </tr>
                    </thead>
                    <tbody id="visitorTable">
                        @foreach ($latestHosts as $host)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $host->name }}</td>
                                <td>{{ $host->email }}</td>
                                <td>{{ $host->phone }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('components.footer') --}}
</div>
@endsection
