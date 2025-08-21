<div class="table-responsive">
    <table class="table table-hover" id="visitorTable">
        <thead>
            <tr>
                <th>Visitor Id</th>
                <th scope="col">Visitor Name</th>
                <th scope="col">Phone No</th>
                <th scope="col">Company Name</th>
                <th scope="col">Time In</th>
                <th scope="col">Time Out</th>

                <th scope="col">Status</th>
                @if (auth()->user()->role != 'Host' && auth()->user()->role != 'host')
                    <th scope="col">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->visitor_id }}</td>

                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>{{ $visitor->company_name ?? '' }}
                    </td>
                    <td><button
                            class="px-2 py-0 btn btn-success ">{{ Carbon\Carbon::parse($visitor->time_of_arrival)->format('h:i A') }}</button>
                    </td>
                    <td>
                        @if ($visitor->time_of_departure)
                            <button
                                class="px-2 py-0 btn btn-danger ">{{ Carbon\Carbon::parse($visitor->time_of_departure)->format('h:i A') }}</button>
                        @else
                            <form action="{{ route('visitor.updateExitedAt', $visitor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-2 py-0 btn btn-primary btn-sm ">
                                    Set Exit Time
                                </button>
                            </form>
                        @endif
                    </td>

                    <td>
                        <select class="form-control form-control-sm update-status" data-id="{{ $visitor->id }}">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ $visitor->status == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    @if (auth()->user()->role != 'Host' && auth()->user()->role != 'host')
                        <td>
                            <div class="gap-1 d-flex align-items-center">
                                <a href="{{ route('visitors.show', $visitor->id) }}" class="btn btn-success btn-xs">
                                    <i class="cursor-pointer fas fa-eye "></i>
                                </a>
                                <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-info btn-xs">
                                    <i class="cursor-pointer fas fa-edit"></i>
                                </a>
                                <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');" class="p-0 m-0 d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="cursor-pointer fas fa-trash "></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <!-- /.content-wrapper --> --}}
</div>
@push('scripts')
    <script>
        $(document).on('change', '.update-status', function() {
            var visitorId = $(this).data('id');
            var newStatus = $(this).val();

            $.ajax({
                url: "{{ route('visitor.updateStatus') }}", // No dynamic part needed
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    visitor_id: visitorId,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success("Status updated successfully!");
                    } else {
                        toastr.error("Failed to update status.");
                    }
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message || "Something went wrong.");
                }
            });
        });
    </script>
@endpush
