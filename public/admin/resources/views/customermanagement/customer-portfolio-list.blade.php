@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customer Portfolio List</h1>
           <!-- <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>
                
            </div>-->

        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Property Name</th>
                                <th>Property Price</th>
                                <th>Property Size</th>
                                <th>Mobile No</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($users as $key=>$list)
						<tr>
						   
							<td>{{ ++$key }}</td>
							<td>{{ $list->prop_name }}</td>
							<td>Rs {{ number_format($list->prop_price) }}</td>
							<td>{{ $list->prop_size }}</td>
							<td>{{ $list->mobile }}</td>
							<td>
							    @if($list->status == 1)
							    <span class="badge badge-success">Active</span>
							    @else
							    <span class="badge badge-warning">Pending</span>
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
</script> 
@endsection
