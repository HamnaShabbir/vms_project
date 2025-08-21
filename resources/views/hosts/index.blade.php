@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh modal wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title text-secondary fw-bold">Host Management</h5>
                            <div class="d-flex gap-2">
                                <a class="p-1 btn btn-primary btn-sm" href="{{ route('hosts.create') }}">
                                    <i class="fas fa-plus"></i> Add
                                </a>
                                @include('components.excelExport')
                            </div>


                        </div>


                        <hr>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <div class="mt-4 table-responsive">
                            <table class="table border rounded  table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Phone Number</th>
                                        <th>Extension</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->host->host_id??'' }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->host->department->name ?? '' }}</td>
                                            <td>{{ $user->host->designation->name ?? '' }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->host->extension }}</td>
                                            <td>
                                                @if ($user->host->status == 'active')
                                                    <span class="badge bg-success">{{ $user->host->status }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $user->host->status }}</span>
                                                @endif
                                            <td class="">
                                                <div class="gap-1 d-flex align-items-center">
                                                            {{-- <a href="" class="p-0 mx-0">
                                                                <i class="cursor-pointer fas fa-eye text-primary"></i>
                                                            </a> --}}

                                                    <a href="{{ route('hosts.edit', $user->host->id) }}"
                                                        class="btn btn-info btn-xs">
                                                        <i class="cursor-pointer fas fa-edit "></i>
                                                    </a>

                                                    <form action="{{ route('hosts.destroy', $user->host->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');"
                                                        class="p-0 m-0 d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="cursor-pointer fas fa-trash "></i>
                                                        </button>
                                                    </form>
                                                </div>
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
@endsection
