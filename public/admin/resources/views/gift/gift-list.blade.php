@extends('layouts.app')

@section('title', 'Gift List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gift List </h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('gift.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Gift</a>
                    <!--<a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>-->
                </div>

            </div>

        </div>

   {{-- Alert Messages --}}
    @include('common.alert')


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>MRP</th>
                                <th>Discount</th>
                                <th>Coupon Code</th>
                                <th>Coupon Discount</th>
                                <th>Coupon Duration</th>
                                <th>Coupon Status</th>
                                <th>Ribbon</th>
                                <th>Thumbnail</th>
                                <th>Date</th>
                                <th>Gift Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gifts as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->category }}</td>
							<td>{{ $list->title }}</td>
							<td>{{ $list->mrp }}</td>
							<td>{{ $list->discount }}%</td>
							<td>{{ $list->coupon_code }}</td>
							<td>{{ $list->coupon_discount }}%</td>
							<td>{{ date('d-m-Y',strtotime($list->coupon_expire_date)) }}</td>
                            <td>
                            <label class="switch">
                                <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->coupon_status == 1) checked @endif>
                                <small></small>
                            </label>
							</td>
							<td>{{ $list->ribbon }}</td>
							<td><img src="{{ asset('').'/'.$list->thumbnail }}" class="" height="50px"></td>
							<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
							<td>
                            <label class="switch">
                                <input type="checkbox" class="status-toggle gift-status" data-id="{{ $list->id }}" @if($list->status == 1) checked @endif>
                                <small></small>
                            </label>
							</td>
							<td>
								<a href="{{ route('gift.edit',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('gift.delete',[$list->id]) }}" 
                                   class="btn btn-danger bnt_alsss delete-btn">
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

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>
<script>


new DataTable( '#example-table-theme', {
    paging: true,

} );
</script>
<script>
    $(document).ready(function () {
        $('.coupon-status').on('change', function () {
            var contactId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('gift.update-coupon-status') }}', // Define the correct route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: contactId,
                    status: status
                },
                success: function (response) {
                    // alert(response.message); // Success message or perform some action
                },
                error: function (xhr) {
                    alert('Something went wrong!');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.gift-status').on('change', function () {
            var contactId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('gift.update-gift-status') }}', // Define the correct route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: contactId,
                    status: status
                },
                success: function (response) {
                    // alert(response.message); // Success message or perform some action
                },
                error: function (xhr) {
                    alert('Something went wrong!');
                }
            });
        });
    });
</script>
@endsection