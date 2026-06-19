<?php
use Illuminate\Support\Str;
?>
@extends('layouts.app')

@section('title', 'Admin Email List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Email List</h1>
            
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
                                <th>Sr No.</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key => $list)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $list->title }}</td>
                                <td>{{ optional($list->template)->title??'N/A' }}</td>
                                <td>{{ optional($list->template)->subject??'N/A' }}</td>
                                <td><a href="{{ route('admin-emails.view', ['id'=>$list->id]) }}"><button class="btn btn-sm btn-info">View</button></a></td>
                                <td>{{ date('M d, Y', strtotime($list->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin-emails.edit', ['id'=>$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
                                    
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
