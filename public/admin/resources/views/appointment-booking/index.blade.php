@extends('layouts.app')
@section('title', 'Appointment Booking List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Appointment Booking List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('appointment-booking.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add Appointment
                </a>
            </div>
        </div>
    </div>
    {{-- Alert --}}
    @include('common.alert')
    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">
                <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Name of the Page</th>
                            <th>Calendar App</th>
                            <th>Testimonials</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->page_name }}</td>
                            <td>{{ $item->calendar_app_name }}</td>
                            <td>
                                <label class="switch">
								  <input id="testimonial_status" onchange="setMarket(this,{{ $item->id}})" type="checkbox"  @if($item->test_visible==1) checked @endif>
								  <small></small>
								</label>
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
                            <td>
                                <!-- Edit -->
                                <a href="javascript:void(0);" onclick='viewDetails(@json($item))'
                                   class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('appointment-booking.edit', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <!-- Delete -->
                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure?')) {
                                       window.location.href='{{ route('appointment-booking.delete', $item->id) }}';
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
<div id="detailsModal" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">View Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-left">

                <p><strong>Title:</strong> <span id="title"></span></p>
                <p><strong>Subtitle:</strong> <span id="subtitle"></span></p>
                <p><strong>Calendar App Name:</strong> <span id="calendar_app_name"></span></p>
                <p><strong>Short Description:</strong> <span id="sort_description"></span></p>

                <p><strong>Step Title:</strong> <span id="step_title"></span></p>

                <hr>

                <p><strong>Left Title 1:</strong> <span id="left_title1"></span></p>
                <p><strong>Description 1:</strong> <span id="left_description1"></span></p>

                <p><strong>Left Title 2:</strong> <span id="left_title2"></span></p>
                <p><strong>Description 2:</strong> <span id="left_description2"></span></p>

                <p><strong>Left Title 3:</strong> <span id="left_title3"></span></p>
                <p><strong>Description 3:</strong> <span id="left_description3"></span></p>

                <hr>

                <p><strong>Embed Title:</strong> <span id="embed_title"></span></p>
                <p><strong>Embed Code:</strong></p>
                <div id="embed_code" style="background:#f5f5f5; padding:10px;"></div>

                <hr>

                <p><strong>Testimonial Title:</strong> <span id="testimonial_title"></span></p>

                <p><strong>Test Visible:</strong> <span id="test_visible"></span></p>
                <p><strong>Test Title Visible:</strong> <span id="test_title_visible"></span></p>

                <p><strong>Status:</strong> <span id="status"></span></p>

            </div>
        </div>
    </div>
</div>
<p class="testimonials_success_btn" data-toggle="modal" data-target="#marketstatus_success" style="opacity:0;"></p>
<p id="detailsModal_btn" data-toggle="modal" data-target="#detailsModal" style="opacity:0;"></p>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    new DataTable( '#example-table-theme', {
    paging: true,
} );
 function setMarket(thiss,id) {
     var status = thiss.checked ? 1 : 0;
      $.ajax({
        type: "GET",
        cache: false,
        url: "{{url('appointment-booking/status')}}/"+id+'/'+status,
        success: function (response) {
            $('.testimonials_success_btn').click();
        }
    });
   }
   // view details
    function viewDetails(data){

        document.getElementById('title').innerHTML = data.title ?? '';
        document.getElementById('subtitle').innerHTML = data.subtitle ?? '';
        document.getElementById('calendar_app_name').innerHTML = data.calendar_app_name ?? '';
        document.getElementById('sort_description').innerHTML = data.sort_description ?? '';

        document.getElementById('step_title').innerHTML = data.step_title ?? '';

        document.getElementById('left_title1').innerHTML = data.left_title1 ?? '';
        document.getElementById('left_description1').innerHTML = data.left_description1 ?? '';

        document.getElementById('left_title2').innerHTML = data.left_title2 ?? '';
        document.getElementById('left_description2').innerHTML = data.left_description2 ?? '';

        document.getElementById('left_title3').innerHTML = data.left_title3 ?? '';
        document.getElementById('left_description3').innerHTML = data.left_description3 ?? '';

        document.getElementById('embed_title').innerHTML = data.embed_title ?? '';

        // ✅ Show HTML safely
        document.getElementById('embed_code').innerHTML = data.embed_code ?? '';

        document.getElementById('testimonial_title').innerHTML = data.testimonial_title ?? '';

        document.getElementById('test_visible').innerHTML = data.test_visible == 1 ? 'Yes' : 'No';
        document.getElementById('test_title_visible').innerHTML = data.test_title_visible == 1 ? 'Yes' : 'No';

        document.getElementById('status').innerHTML = data.status == 1 ? 'Active' : 'Inactive';

        // 🔥 Open modal
        $('#detailsModal_btn').click();
    }
</script>
@endsection