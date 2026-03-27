@extends('layouts.app')
@php
$module_name = 'Passive Profit';
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
                <a href="{{ route('passive-profit.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add {{ $module_name  }} </a>

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
                            <th>Sr. No.</th>
                            <th>Property Name</th>
                            <th>Amount</th>
                            <th>Max Commission Percentage</th>
                            <th>Total Commission Amount</th>
                            <th>Total Benificial Users</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key=>$list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->property_name }}</td>
                            <td>{{ $list->amount }}</td>
                            <td>{{ $list->max_commission_percentage }}%</td>
                            <td>{{ $list->total_commission_amount }}</td>
                            <td><a href="{{ route('passive-profit.commission-details',['id'=>$list->id]) }}">( {{ $list->benificial_count }} )</a></td>
                            <td>{{ date('d M, Y',strtotime($list->created_at)) }}</td>
                            <td>
                               @if($list->status==1)
                                    <span class="badge badge-success badge-lg">Approved</span>
                                @else
                                    <span class="badge badge-warning badge-lg">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if($list->status == 0)
                                    <a href="{{ route('passive-profit.edit',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger bnt_alsss" onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('passive-profit.delete', [$list->id]) }}'; }"><i aria-hidden="true" class="fa fa-trash"></i></a>
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
    new DataTable('#example-table-theme', {
        paging: true,
    });
</script>
@endsection