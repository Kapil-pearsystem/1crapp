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
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reward List</h1>
    </div>
        <!-- Page Heading -->


       

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>User Name</th>
                                <th>Reward Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>Pankaj</td>
                                    <td>1200</td>
                                    <td>09-02-2024</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td><a href="javascript:void(0);" class="btn btn-primary bnt_alsss othrr">Paynow Button</a></td>                                    
                                </tr>
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
