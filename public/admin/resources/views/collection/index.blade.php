<?php
use Illuminate\Support\Str;
?>
@extends('layouts.app')
@section('title', 'Collection List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sequences List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('collection.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Sequence</a>
            </div>
        </div>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">
                <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Sequence Name</th>
                            <th>Seq ID</th>
                            <th>Date/Time</th>
                            <th>No. of Emails</th>
                            <th>No. of Gifts</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->seqID }}</td>
                            <td>{{ date('M d, Y H:i:s', strtotime($list->created_at)) }}</td>
                            <td>{{ $list->emails_count }}</td>
                            <td>{{ $list->gifts_count }}</td>
                            <td>{{ $list->gross_amount }}</td>
                            <td>
                                @if($list->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('collection.edit', $list->id) }}" class="btn btn-primary bnt_alsss">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger bnt_alsss" onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('collection.delete', [$list->id]) }}'; }"><i aria-hidden="true" class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
@endsection
@section('scripts')
@endsection