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

@section('content')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="container-fluid">

        <!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4 alsssee">
			<h1 class="h3 mb-0 text-gray-800">Billing List</h1>
			<div class="row">
				<div class="col-md-7"><!--
					<a href="javascript:void(0);" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#upgrade_md">Upgrade </a>-->
					<a href="javascript:void(0);" class="btn btn-sm btn-success"   data-toggle="modal" data-target="#price_listst">Change Plan </a>
				</div>
			</div>
		</div>


       
        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Product</th> 
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Ref.No</th>
                                <th>Paid Via</th>
                                <th>Action</th>						
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($billing as $key=>$list)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $list->product }}</td> 
									<td>₹. {{ $list->amount }}</td>
                                    <td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
                                    <td>{{ $list->reference_no }}</td>
                                    <td>{{$list->payment_mode }}</td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" onclick="getdetail({{ $list->id }})" data-target="#bi_view_dlts"><span class="badge badge-success"><i class="fa fa-eye"></i></span></a></td>                                   
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

function getPlan()
{
 
	
	  $.ajax({
				type: "GET",
				cache: false,
				url: "{{route('billing.planlist')}}",
			
				success: function (response) {
					$('#plan-list-data').html(response); 
				}
			});
	
	
}
function getdetail(id)
{
 
	
	  $.ajax({
				type: "GET",
				cache: false,
				url: "{{url('billing/detail')}}/"+id,
			
				success: function (response) {
					$('#plandetail').html(response); 
				}
			});
	
	
}


</script> 
@endsection
