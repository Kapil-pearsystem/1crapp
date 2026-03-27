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

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction List</h1>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="example-table-theme" width="100%">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>User Name</th> 
                            <th>Txn Id</th>
                            <th>Txn Type</th> 
                            <th>Entry Type</th> 
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Paid Via</th>
                            <th>Status</th>
                            <th>Action</th>						
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($billing as $key=>$list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->first_name }} {{ $list->last_name }}</td> 
                            <td>{{ $list->txnid }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->entryType }}</td>
                            <td>₹{{ $list->amount }}</td>
                            <td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
                            <td>{{ $list->transfer_mode }}</td>

                            <td>
                                <span class="badge {{ $list->status == 1 ? 'badge-success' : 'badge-warning' }}">
                                    {{ $list->status == 1 ? 'Confirmed' : 'Pending' }}
                                </span>
                            </td>

                            <td>
                                <a href="javascript:void(0);" 
                                   data-toggle="modal" 
                                   onclick="gettxndetail({{ $list->id }})" 
                                   data-target="#bi_view_dlts">

                                   <span class="badge badge-success">
                                       <i class="fa fa-eye"></i>
                                   </span>

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

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


<script>

$(document).ready(function () {

    $('#example-table-theme').DataTable({

        paging: true,
        ordering: true,
        searching: true,
        pageLength: 10,

        dom: 'Bfrtip',

        buttons: [

            {
                extend: 'copy',
                title: 'Transaction List',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            },

            {
                extend: 'csv',
                title: 'Transaction List',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            },

            {
                extend: 'excel',
                title: 'Transaction List',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            },

            {
                extend: 'pdf',
                title: 'Transaction List',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            },

            {
                extend: 'print',
                title: 'Transaction List',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            }

        ]

    });

});


function getPlan()
{
    $.ajax({
        type: "GET",
        cache: false,
        url: "{{route('billing.planlist')}}",
        success: function (response) {
            $('#plan-list-data').html(response); 
        }
    });
}


function gettxndetail(id)
{
    $.ajax({
        type: "GET",
        cache: false,
        url: "{{url('transaction/detail')}}/"+id,
        success: function (response) {
            $('#plandetail').html(response); 
        }
    });
}

</script>

@endsection