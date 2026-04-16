@extends('layouts.app')

@section('title', 'Schedule Appointment List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Schedule Appointment List</h1>

        <a href="{{ route('schedule-appointment.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Schedule Appointment
        </a>
    </div>

    @include('common.alert')

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="schedule-table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Calendar</th>
                            <th>Meeting URL</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @foreach($lists as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>

                        <td>{{ $item->title }}</td>

                        <!-- Date -->
                        <td>{{ date('M d, Y', strtotime($item->schedule_date)) }}</td>

                        <!-- Time -->
                        <td>
                            {{ $item->schedule_hour }}:
                            {{ $item->schedule_minute }}
                            {{ $item->schedule_am_pm }}
                        </td>

                        <!-- Duration -->
                        <td>{{ $item->duration ?? '—' }} min</td>

                        <!-- Calendar -->
                        <td>{{ $calenders[$item->calendar_product_id] ?? '—' }}</td>

                        <!-- Meeting URL -->
                        <td>
                            @if($item->location_url)
                            <a href="{{ $item->location_url }}" target="_blank">Join</a>
                            @else
                            —
                            @endif
                        </td>

                        <!-- Status -->
                        <td>
                            @if ($item->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>

                        <!-- Created -->
                        <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>

                        <!-- Action -->
                        <td>
                            <a href="javascript:void(0)" 
   class="btn btn-info btn-sm viewBtn"
   data-title="{{ $item->title }}"
   data-date="{{ date('M d, Y', strtotime($item->schedule_date)) }}"
   data-time="{{ $item->schedule_hour }}:{{ $item->schedule_minute }} {{ $item->schedule_am_pm }}"
   data-duration="{{ $item->duration ?? '—' }}"
   data-calendar="{{ $calenders[$item->calendar_product_id] ?? '—' }}"
   data-url="{{ $item->location_url ?? '' }}"
   data-status="{{ $item->status == 1 ? 'Active' : 'Inactive' }}"
   data-created="{{ date('M d, Y', strtotime($item->created_at)) }}"
>
    <i class="fa fa-eye"></i>
</a>
                            <a href="{{ route('schedule-appointment.edit', $item->id) }}"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>

                            <a href="#" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')) {
               window.location.href='{{ route('schedule-appointment.delete', $item->id) }}';
           }">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <p><b>Title:</b> <span id="v_title"></span></p>
                <p><b>Date:</b> <span id="v_date"></span></p>
                <p><b>Time:</b> <span id="v_time"></span></p>
                <p><b>Duration:</b> <span id="v_duration"></span></p>
                <p><b>Calendar:</b> <span id="v_calendar"></span></p>
                <p><b>Meeting URL:</b> <span id="v_url"></span></p>
                <p><b>Status:</b> <span id="v_status"></span></p>
                <p><b>Created:</b> <span id="v_created"></span></p>
            </div>

        </div>
    </div>
</div>
@endsection


@section('scripts')

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- DataTable -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('#schedule-table').DataTable({
        paging: true,
        searching: true, // 🔍 search enabled
        ordering: true,
        order: [
            [0, 'desc']
        ]
    });
});
</script>
<script>
    $(document).on('click', '.viewBtn', function() {

    $('#v_title').text($(this).data('title'));
    $('#v_date').text($(this).data('date'));
    $('#v_time').text($(this).data('time'));
    $('#v_duration').text($(this).data('duration'));
    $('#v_calendar').text($(this).data('calendar'));
    $('#v_status').text($(this).data('status'));
    $('#v_created').text($(this).data('created'));

    let url = $(this).data('url');
    if(url){
        $('#v_url').html('<a href="'+url+'" target="_blank">Join Meeting</a>');
    } else {
        $('#v_url').text('—');
    }

    $('#viewModal').modal('show');
});
</script>

@endsection