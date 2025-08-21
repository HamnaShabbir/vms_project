@extends('layouts.master')


@section('main_content')
    <div class="container-fluid">
        <div class="m-1 row">
            <div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-secondary fw-bold">Receptionist Details</h5>
                        </div>

                        <table class="table mt-3 table-bordered">
                            <tr>
                                <th class="text-secondary">ID:</th>
                                <td class="text-secondary">{{ $receptionist->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Name:</th>
                                <td class="text-secondary">{{ $receptionist->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Role:</th>
                                <td class="text-secondary">{{ $receptionist->role }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Email:</th>
                                <td class="text-secondary">{{ $receptionist->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Phone:</th>
                                <td class="text-secondary">{{ $receptionist->phone_number }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Access Level:</th>
                                <td class="text-secondary">{{ $receptionist->access_level }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Shift:</th>
                                <td class="text-secondary">{{ $receptionist->shift }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Created At:</th>
                                <td class="text-secondary">
                                    {{ $receptionist->created_at ? $receptionist->created_at->format('d M Y, h:i A') : 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Updated At:</th>
                                <td class="text-secondary">
                                    {{ $receptionist->updated_at ? $receptionist->updated_at->format('d M Y, h:i A') : 'N/A' }}
                                </td>
                            </tr>
                        </table>

                        <a href="{{ route('receptionists.index') }}" class="p-1 mt-3 btn btn-sm create"
                            style="width: 120px;">
                            <i class="fas fa-arrow-left"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection
