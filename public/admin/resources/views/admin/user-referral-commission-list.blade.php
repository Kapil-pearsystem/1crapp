@extends('layouts.app')

@section('title', 'User Referral Comission ')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Referral Comission </h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('user-referral-commission.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add User Referral Comission</a>
                </div>
            </div>
        </div>
    @include('common.alert')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Points</th> 
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($r_commission as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->points }}</td> 
							<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
							<td>
                            <label class="switch">
                                <input type="checkbox" class="status-toggle" data-id="{{ $list->id }}" @if($list->status == 1) checked @endif>
                                <small></small>
                            </label>
							</td>
							<td>
								<a href="{{ route('user-referral-commission.edit',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('user-referral-commission.delete',[$list->id]) }}" onclick="return confirm('Are you sure you want to delete this commission points?')" class="btn btn-danger bnt_alsss"><i aria-hidden="true" class="fa fa-trash-o"></i></a>
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
<script>
new DataTable( '#example-table-theme', {
    paging: true,
    
} );
</script> 
<script>
    $(document).ready(function () {
        $('.status-toggle').on('change', function () {
            var contactId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('user-referral-commission.update-status') }}', // Define the correct route
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