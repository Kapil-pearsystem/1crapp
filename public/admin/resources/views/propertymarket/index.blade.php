@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Property Market</h1>
            <form method="get">
		        <select class="form-control" onchange="this.form.submit()" name="user">
		            <option value="">select user</option>
		            @foreach($users as $user)
		                <option value="{{$user->id}}" @if(request()->user == $user->id) selected @endif>{{$user->name}}</option>
		            @endforeach
		        </select>
		    </form>
            <div class="row">
                <div class="col-md-12">
                    
				    <a href="{{ route('propertymarket.addpropertymarket') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Property</a>
                  <!--  <a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">
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
                                <th>Property</th>
                                <th>Owner Name</th>
                                <th>Owner Belongs to</th>
                                <th>Property Type</th>
                                <th>Project/Builder Name</th>
                                <th>Location</th>
                                <th>Date of Posting</th>
                                <th>Feedback</th>
                                <th>Current Status</th>
                                <th>Posted By</th>
                                <th>Date of Last Action</th> 
                                <th>Status</th>
                                <th>Market Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                         
                            
                            @foreach($propertymarket as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->property }}</td>
							<td>{{ $list->owner_name }}</td>
							<td>{{ $list->owner_belong }} </td>
							<td>{{ $list->property_type }}</td>
							<td>{{ $list->project_name }}</td>
							<td>{{ $list->location }}</td>
							<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
							<td>{{ $list->feedback }}</td>
							<td>{{ $list->current_status }}</td> 
							<td>{{ $list->posted_by }}</td> 
							<td>{{ date('d-m-Y',strtotime($list->updated_at)) }}</td> 
							<td>
							    @if($list->status==1)
							        <span class="badge badge-success">Active</span>
							    @else
							        <span class="badge badge-danger">Inactive</span>
							    @endif
							 <!--    <label class="switch">-->
								<!--  <input type="checkbox"  @if($list->status==1) checked @endif>-->
								<!--  <small></small>-->
								<!--</label>-->
							</td>
							<td>
							     <label class="switch">
								  <input id="market_status" onchange="setMarket(this,{{ $list->id}})" type="checkbox"  @if($list->market_status==1) checked @endif>
								  <small></small>
								</label>
							</td>
							<td>
								<a href="{{ route('propertymarket.editpropertymarket',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('propertymarket.popup-details',[$list->id]) }}" class="btn btn-primary bnt_alsss" title="popup details"><i aria-hidden="true" class="fa fa-plus"></i></a>
								<!--<a href="{{ route('propertymarket.editpropertymarket',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>-->
								
								<a href="{{ route('propertymarket.destroy',[$list->id]) }}" class="btn btn-danger bnt_alsss" onclick="return confirm('Are you sure you want to delete this property?')"><i aria-hidden="true" class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					  </tbody>

                    </table>

                
                </div>
            </div>
        </div>

    </div>
 
<p class="marketstatus_success_btn" data-toggle="modal" data-target="#marketstatus_success" style="opacity:0;"></p>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
 

new DataTable( '#example-table-theme', {
    paging: true,
    
} );

 function setMarket(thiss,id) {
     var status = thiss.checked ? 1 : 0;
      $.ajax({
				type: "GET",
				cache: false,
				url: "{{url('propertymarket/status')}}/"+id+'/'+status,
			
				success: function (response) {
					$('.marketstatus_success_btn').click(); 
				}
			});
			
			
     
   }
   
   
</script> 
@endsection
