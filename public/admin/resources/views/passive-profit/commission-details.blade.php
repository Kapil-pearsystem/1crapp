@extends('layouts.app')
@php
$module_name = 'Customer Commission Details';
$module_url = 'passive-profit';
@endphp
@section('title', $module_name )

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $module_name  }}</h1>
            <div class="row">
                <div class="col-md-12">
                    @if($property->status==0)
                    <a href="{{ route('passive-profit.approve', $property->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to approve this?')">
                        Approve
                    </a>
                    @elseif($property->status==1)
                    <a href="javascript:void(0)" class="btn btn-sm btn-success" >
                        Approved
                    </a>
                    @elseif($property->status==2)
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                        Rejected
                    </a>
                    @endif
				    <a href="{{ route('passive-profit.index') }}" class="btn btn-sm btn-danger"> Back </a>

                </div>

            </div>

        </div>

   {{-- Alert Messages --}}
    @include('common.alert')


            <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div id="brd_box" class="form-group row">

                <div class="col-sm-3 mb-2 mt-1 mb-sm-0">
                    <b>Property Name:</b> {{ $property->property_name }}
                </div>
                <div class="col-sm-4 mb-2 mt-1 mb-sm-0">
                    <b>Consideration Value/Amount:</b> {{ $property->amount }}
                </div>
                <div class="col-sm-5 mb-2 mt-1 mb-sm-0">
                    <b>Max Commission Percentage:</b> {{ $property->max_commission_percentage }}% - ( {{ $property->total_commission_amount }} )
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Users</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Level 1</th>
                        <td>{{ $property->level1_count }}</td>
                        <td>{{ $property->level1_percentage }}%</td>
                        <td>{{ $property->level1_amount }}</td>
                        </tr>
                        <tr>
                       <th scope="row">Level 2</th>
                        <td>{{ $property->level2_count }}</td>
                        <td>{{ $property->level2_percentage }}%</td>
                        <td>{{ $property->level2_amount }}</td>
                        </tr>
                        <tr>
                        <th scope="row">Level 3</th>
                        <td>{{ $property->level3_count }}</td>
                        <td>{{ $property->level3_percentage }}%</td>
                        <td>{{ $property->level3_amount }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col"><b>Total Users: </b>{{ $property->level1_count+$property->level2_count+$property->level3_count }}</th>
                            <th scope="col"><b>Tatal Percentage: </b> {{ $property->level1_percentage+$property->level2_percentage+$property->level3_percentage }}%</th>
                            <th scope="col"><b>Total Payble Amount: </b>{{ $property->level1_amount+$property->level2_amount+$property->level3_amount }}</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- <div class="col-sm-4 mb-2 mt-1 mb-sm-0">
                    <b>Total Level 1 Benificial:</b>{{ $property->property_name }}
                </div>
                <div class="col-sm-4 mb-2 mt-1 mb-sm-0">
                    <b>Consideration Value/Amount:</b>{{ $property->amount }}
                </div>
                <div class="col-sm-4 mb-2 mt-1 mb-sm-0">
                    <b>Max Commission Percentage:</b>{{ $property->max_commission_percentage }} -( {{ $property->total_commission_amount }} )
                </div> -->
            </div>
            <br>
            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Customer Name</th>
                                <th>Level</th>
                                <th>Commission Percentage</th>
                                <th>Commission Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->customer_name }}</td>
							<td>{{ $list->level }}</td>
							<td>{{ $list->commission_percentage }}%</td>
							<td>{{ $list->commission_amount }}</td>
							<td>{{ date('d M, Y',strtotime($list->created_at)) }}</td>
							<td>
                                @if($list->status==1)
                                    <span class="badge badge-success badge-lg">Approved</span>
                                @else
                                    <span class="badge badge-warning badge-lg">Pending</span>
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