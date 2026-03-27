@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product & Services </h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('productservices.addproductservss') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Product</a>
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
                                <th>Product</th>
                                <th>Category</th>
                                <th>MRP</th>
                                <th>Rate</th>
                                <th>Date of Entry </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->prod_name }}</td>
							<td>{{ $list->name }}</td>
							<td>{{ $list->prod_price }}</td>
							<td>{{ $list->prod_rate }}</td>
							<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
							<td>
							     <label class="switch">
								  <input @if($list->status==1) checked @endif  type="checkbox">
								  <small></small>
								</label>
							</td>
							<td>
								<a href="{{ route('productservices.editproductservss',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('productservices.inspection.list', $list->id) }}" class="btn btn-sm btn-warning" title="Add/Edit Inspection"><i class="fa fa-search"></i></a>
							 <!--<a href="javascript:void(0);" class="btn btn-danger bnt_alsss" data-toggle="modal" data-target="#deletss"><i aria-hidden="true" class="fa fa-trash-o"></i></a>-->
							 <a class="btn btn-danger m-2 deleteBtn" 
                                   href="#" 
                                   data-url="{{ route('productservices.destroy', $list->id) }}"
                                   data-toggle="modal" 
                                   data-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
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
 
<!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
    
                    
                        <a href="" id="delete-path"><button type="submit" class="btn btn-danger">
                            Yes, Delete
                        </button></a>
                </div>
    
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).on("click", ".deleteBtn", function () {
        var url = $(this).data("url");
        $("#delete-path").attr("href", url);
    });
</script>
<script>
 

new DataTable( '#example-table-theme', {
    paging: true,
    
} );
</script> 
@endsection
