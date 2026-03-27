@extends('layouts.app')

@section('title', 'Booking Event List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Booking Event List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('booking-event.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add Booking Event
                </a>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="booking-event-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Step</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Video</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $key => $event)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>
                                <span class="badge badge-info">
                                    Step {{ $event->step }}
                                </span>
                            </td>

                            <td>{{ $event->title }}</td>

                            <td>
                                @if($event->image)
                                    <img src="{{ $event->image }}"
                                         style="max-width:80px;">
                                @else
                                    —
                                @endif
                            </td>

                            <td>
                                @if($event->video_link)
                                    <a href="{{ $event->video_link }}" target="_blank"
                                       class="btn btn-sm btn-dark">
                                        View
                                    </a>
                                @else
                                    —
                                @endif
                            </td>

                            <td>{{ date('M d, Y', strtotime($event->created_at)) }}</td>

                            <td>
                                @if ($event->status == 0)
                                    <span class="badge badge-danger">Inactive</span>
                                @else
                                    <span class="badge badge-success">Active</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('booking-event.edit', ['id'=>$event->id]) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')) {
                                       window.location.href='{{ route('booking-event.delete', [$event->id]) }}';
                                   }">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#booking-event-table').DataTable({
            paging: true,
            order: [[1, 'asc']] // order by step
        });
    });
</script>
@endsection
