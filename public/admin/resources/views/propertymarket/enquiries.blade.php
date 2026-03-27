@extends('layouts.app')

@section('title', 'Enquiry List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Enquiry List</h1>
            <div class="row">
                <div class="col-md-12">
				    <!--<a href="" class="btn btn-sm btn-primary"> Back</a>-->
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Requirement</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                         
                            
                            @foreach($lists as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->property }}</td>
							<td>{{ $list->name }}</td>
							<td>{{ $list->email }} </td>
							<td>{{ $list->mobile }}</td>
							<td>{{ $list->requirement }}</td>
							<td>{{ $list->message }}</td>
							<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
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
