@extends('layouts.app')

@section('title', 'Category List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Service Category </h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('web.service-category.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Category</a>
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
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->title }}</td>
							<td>{{ date('d M, Y',strtotime($list->created_at)) }}</td>
							<td>
							     <label class="switch">
								  <input @if($list->status==1) checked @endif  type="checkbox">
								  <small></small>
								</label>
							</td>
							<td>
								<a href="{{ route('web.service-category.edit',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
                                <a href="#" class="btn btn-danger bnt_alsss" onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('web.service-category.delete', [$list->id]) }}'; }"><i aria-hidden="true" class="fa fa-trash"></i></a>
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