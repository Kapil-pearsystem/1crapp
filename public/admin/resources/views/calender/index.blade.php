@extends('layouts.app')

@section('title', 'Calender List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Calender List</h1>

        <a href="{{ route('calender.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Calender
        </a>
    </div>

    @include('common.alert')

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="calender-table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Title</th>
                            <!-- <th>Slug</th> -->
                            <th>LP Page Name</th>
                            <th>AA Page Name</th>
                            <th>Booking Page</th>
                            <th>Homework Page</th>
                            <th>Thank You Page</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>{{ $item->title }}</td>

                            <!-- <td>
                                <code>{{ $item->slug }}</code>
                            </td> -->

                            <td>{{ $pages[$item->select_lp_id] ?? '—' }}</td>

                            <td>{{ $pages[$item->aa_page_id] ?? '—' }}</td>

                            <td>{{ $appointmentbooking[$item->select_booking_page_id] ?? '—' }}</td>

                            <td>{{ $appointmenthomework[$item->homework_page_id] ?? '—' }}</td>

                            <td>{{ $thankyou[$item->thank_you_id] ?? '—' }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>

                            <td>
                                <!-- View -->
                            <button class="btn btn-info btn-sm viewBtn"
                                data-title="{{ $item->title }}"
                                data-lp="{{ $pages[$item->select_lp_id] ?? '-' }}"
                                data-aa="{{ $pages[$item->aa_page_id] ?? '-' }}"
                                data-booking="{{ $appointmentbooking[$item->select_booking_page_id] ?? '-' }}"
                                data-homework="{{ $appointmenthomework[$item->homework_page_id] ?? '-' }}"
                                data-thankyou="{{ $thankyou[$item->thank_you_id] ?? '-' }}"
                                data-status="{{ $item->status == 1 ? 'Active' : 'Inactive' }}">
                                <i class="fa fa-eye"></i>
                            </button>
                                <!-- Edit -->
                                <a href="{{ route('calender.edit', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <!-- Delete -->
                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure?')) {
                                       window.location.href='{{ route('calender.delete', $item->id) }}';
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
<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Calender Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <p><b>Title:</b> <span id="v_page_name"></span></p>
                <p><b>LP:</b> <span id="v_lp"></span></p>
                <p><b>AA Page:</b> <span id="v_aa"></span></p>
                <p><b>Booking Page:</b> <span id="v_booking"></span></p>
                <p><b>Homework Page:</b> <span id="v_homework"></span></p>
                <p><b>Thank You Page:</b> <span id="v_thankyou"></span></p>
                <p><b>Status:</b> <span id="v_status"></span></p>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- ✅ DataTable JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


<script>
$(document).on('click', '.viewBtn', function () {

    $('#v_page_name').text($(this).data('title'));
    $('#v_lp').text($(this).data('lp'));
    $('#v_aa').text($(this).data('aa'));
    $('#v_booking').text($(this).data('booking'));
    $('#v_homework').text($(this).data('homework'));
    $('#v_thankyou').text($(this).data('thankyou'));
    $('#v_status').text($(this).data('status'));

    $('#viewModal').modal('show');
});
</script>


<script>
$(document).ready(function () {
    $('#calender-table').DataTable({
        paging: true,
        searching: true,   // 🔍 search enable
        ordering: true,
        order: [[0, 'desc']]
    });
});
</script>
@endsection