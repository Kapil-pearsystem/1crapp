<?php

use Illuminate\Support\Str;
?>
@extends('layouts.app')
@section('title', 'Header Navigation')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Header Navigation List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('header-navigation.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add</a>
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
                            <th>#</th>
                            <th>Title</th>
                            <th>Page</th>
                            <th>Parent Page</th>
                            <th>Type</th>
                            <th>Priority</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ optional($list->asset)->title }}</td>
                            <td>{{ optional($list->parentNavigation)->title ?? 'N/A' }}</td>
                            <td>{{ $list->is_authorized == 2 ? 'Common' : ($list->is_authorized == 1 ? 'Post Login' : 'Pre Login') }}</td>
                            
                            <td>{{ $list->priority }}</td>
                            <td>{{ date('M d, Y', strtotime($list->created_at)) }}</td>
                            <td>
                                @if($list->status == 1) 
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('header-navigation.edit', ['id'=>$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
                                <a href="#" class="btn btn-danger bnt_alsss" onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('header-navigation.delete', [$list->id]) }}'; }"><i aria-hidden="true" class="fa fa-trash"></i></a>
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
    $(document).ready(function() {
        $('#example-table-theme').DataTable({
            paging: true,
        });
    });
</script>
@endsection