<?php 
if($admin){
    $createRoute = route('admin.create');
    $expotRoute = route('admin.export');
}
else {
    $createRoute = route('users.create');
    $expotRoute = route('users.export');
}
?>
@extends('layouts.app')

@section('title', 'Agents List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reward List </h1>
    </div>
    

<div id="paynow_modal" class="modal fade all_pages_covrss" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Reward Payout</h4>
            </div>
            <div class="modal-body">
             <form action="{{ route('affiliatesmanagement.payReward')}}" method="POST">
                 @csrf
                 <input type="hidden" name="id" id="rewardid" value="">
			   <div class="form-group row">
				
					<div class="col-sm-12 mb-3 mb-sm-0">
                         
                        <div class="pls_liststs"><strong>Reward Amount : </strong>₹ <span class="rewardamount">1000</span> Per Month</div>
                    </div>
					
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
					 <div class="text-center">
						<button type="submit" class="btn btn-success btn-user">Pay Now</button>
					 </div>
					</div>
				</div>	
			 </form>
            </div>
        </div>
    </div>
</div>
        <!-- Page Heading -->


       

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          
            
        {{-- Alert Messages --}}
        @include('common.alert')

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>User Name</th>
                                <th>Reward Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rewards as $key=>$list)
                              <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $list->first_name}} {{ $list->last_name}}</td>
                                    <td>{{ $list->amount}}</td>
                                    <td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
                                      <td>
                                        @if ($list->status == 0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif ($list->status == 1)
                                            <span class="badge badge-success">Confirmed</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                         @if ($list->status == 0)
                                           <a href="javascript:void(0);" onclick="$('#rewardid').val({{ $list->id }}),$('.rewardamount').val({{ $list->amount }})"  data-toggle="modal" data-target="#paynow_modal" class="btn btn-primary m-2 bnt_alsss">Pay Now</a>
                                        @elseif ($list->status == 1)
                                            <span class="badge badge-success">Paid</span>
                                        @endif
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

function paynow(id){
    $('#rewardid').val(id);
    $('#paynow_modal').modal('show');
}
</script> 
@endsection
