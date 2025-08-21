@extends('layouts.master')



@section('main_content')
    <div class="container-fluid">
        <div class="m-1 row">
            <div class="p-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-secondary fw-bold">visitorPolicy Details</h5>
                        </div>

                        <table class="table mt-3 table-bordered">
                            <tr>
                                <th class="text-secondary">Visitor Policy Title:</th>
                                <td class="text-secondary">{{ $visitorPolicy->title }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Description:</th>
                                <td class="text-secondary">{{ $visitorPolicy->description }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Attachment:</th>
                                <td>
                                    @if ($visitorPolicy->attachment)
                                        <a href="{{ asset('uploads/' . $visitorPolicy->attachment) }}"
                                            target="_blank">Download File</a>
                                    @else
                                        <span class="text-secondary">No File Attached</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Created At:</th>
                                <td class="text-secondary">
                                    {{ $visitorPolicy->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Updated At:</th>
                                <td class="text-secondary">
                                    {{ $visitorPolicy->updated_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('visitor-policy.index') }}" class="my-2 btn btn-sm btn-secondary"
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
