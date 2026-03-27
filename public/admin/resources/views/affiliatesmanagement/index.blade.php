@extends('layouts.app')

@section('title', 'Agents List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Referred Customer List</h1>
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
					<table id="example-table-theme"width="100%" cellspacing="0" class="table table-bordered">
						<thead>
						    
							<tr>
								<th>Sr No.</th>
								<th>Referee User</th>
								<th>Referred User</th>
								<th>Referral Code</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
						      @foreach($referredUsers as $key=>$list)
						 	<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $list->name }}</td>
								<td>{{ $list->first_name }} {{ $list->last_name }}</td>
								<td>{{ $list->applied_referral }}</td>
								<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
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
