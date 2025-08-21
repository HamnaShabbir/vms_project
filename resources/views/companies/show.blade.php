@extends('layouts.master')


@section('main_content')
    <div class="container-fluid">
        <div class="m-1 row">
            <div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title text-secondary fw-bold">Company Details</h5>
                        </div>

                        <table class="table mt-3 table-bordered">
                            <tr>
                                <th class="text-secondary">ID:</th>
                                <td class="text-secondary">{{ $company->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Company Name:</th>
                                <td class="text-secondary">{{ $company->company_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Email:</th>
                                <td class="text-secondary">{{ $company->company_email }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Phone:</th>
                                <td class="text-secondary">{{ $company->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Website:</th>
                                <td class="text-secondary">
                                    <a href="{{ $company->website }}" target="_blank"
                                        class="text-secondary">{{ $company->website }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Visitor Policy:</th>
                                <td class="text-secondary">{{ $company->visitor_policy }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Timezone:</th>
                                <td class="text-secondary">{{ $company->timezone }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Status:</th>
                                <td class="text-secondary">{{ $company->status }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Address:</th>
                                <td class="text-secondary">{{ $company->address }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Logo:</th>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                            width="45" height="40" class="">
                                    @else
                                        <span class="text-secondary">No Logo Available</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Created At:</th>
                                <td class="text-secondary">{{ $company->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Updated At:</th>
                                <td class="text-secondary">{{ $company->updated_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('company.index') }}" class="p-1 mt-3 btn btn-sm create" style="width: 120px;">
                            <i class="fas fa-arrow-left"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
