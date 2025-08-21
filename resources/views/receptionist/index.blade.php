@extends('layouts.master')


@section('main_content')
    <div class="container-fluid ">
        <div class="m-1 row">
            <!-- yeh table wala part hai -->
            <div class="p-2 col-xs-1 col-sm-1 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">All Receptionist
                            </h5>
                            <!-- "Create User" Icon to Trigger Modal -->
                            <a href="{{ route('receptionist.create') }}" class=" btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Create
                            </a>
                        </div>
                        <hr>
                        {{-- for check success or error message --}}
                        @include('components.messages')
                        {{-- Success and Error Messages when form fill --}}
                        <div class="mt-4 table-responsive">
                            <table class="table border rounded  table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Receptionist Name</th>
                                        {{-- <th>Role</th> --}}
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        {{-- <th>Access Level</th>
                                                    <th>Shift Timing</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($reception as $receptionist)
                                        <tr>
                                            <td>{{ $receptionist->name }}</td>
                                            {{-- <td>{{ $receptionist->role }}</td> --}}
                                            <td>{{ $receptionist->email }}</td>
                                            <td>{{ $receptionist->phone ?? '--' }}
                                            </td>
                                            {{-- <td>{{ $receptionist->access_level }}</td>
                                                        <td>{{ $receptionist->shift }}</td> --}}
                                            <td class="">
                                                <div class="gap-1 d-flex align-items-center">
                                                    {{-- <a href="{{ route('receptionist.show', $receptionist->id) }}"
                                                                    class="p-0 mx-0 text-decoration-none text-primary">
                                                                    <i
                                                                        class="cursor-pointer fas fa-eye  text-primary"></i>
                                                                </a> --}}

                                                    <a href="{{ route('receptionist.edit', $receptionist->id) }}"
                                                        class="btn btn-xs btn-info">
                                                        <i class="cursor-pointer fas fa-edit"></i>
                                                    </a>

                                                    {{-- <form action="{{ route('receptionist.destroy', $receptionist->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');"
                                                        class="p-0 m-0 d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="submit" class="btn btn-xs btn-danger">
                                                            <i class="cursor-pointer fas fa-trash"></i>
                                                        </a>
                                                    </form> --}}

                                                    <form action="{{ route('receptionist.destroy', $receptionist->id) }}" 
                                                        method="POST" onsubmit="return confirm('Are you sure?');"
                                                        class="p-0 m-0 d-inline">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="cursor-pointer fas fa-trash"></i>
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
    {{-- @include('components.footer') --}}
    </div>


    @include('components.dash-script')
@endsection
