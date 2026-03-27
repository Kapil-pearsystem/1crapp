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
			<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		</div>




        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>Sr No.</th>
                                <th>Requirement Product</th>
                                <th>Source</th>
                                <th>Category</th>
                                <th>Name of client</th>
                                <th>Phone No</th>
                                <th>Email ID</th>
                                <th>Order Date</th>
                                <th>Update Date</th>
                                <th>Remark</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($orders as $key=>$list)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $list->prod_name }}</td>
                                    <td>{{ $list->prod_source }}</td>
                                    <td>{{ $list->prod_category }}</td>
									<td>{{ $list->client_name }}</td>
                                    <td>{{ $list->client_phone }}</td>
                                    <td>{{ $list->client_email }}</td>
                                    <td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
                                    <td>{{ date('d-m-Y',strtotime($list->updated_at)) }}</td>
                                    <td>{{  $list->remark  }}</td>
                                    <td><a href="javascript:void(0);">
                                         @if($list->status == 1)
        							    <span class="badge badge-success">Delivered</span>
        							    @else
        							    <span class="badge badge-warning">Pending</span>
        							    @endif
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
<script>


new DataTable( '#example-table-theme', {
    paging: true,

} );
</script>
@endsection
