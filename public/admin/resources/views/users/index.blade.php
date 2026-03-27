<?php
if($admin){
    $createRoute = route('admin.create');
    $expotRoute = route('admin.export');
}
else {
    $createRoute = route('agent.create');
    $expotRoute = route('agent.export');
}
?>
@extends('layouts.app')

@section('title', 'Agents List')
<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" rel="stylesheet">



@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 alsssee">
            <h1 class="h3 mb-0 text-gray-800"><?=$admin ? 'Admin' : 'Agents'?> List</h1>
            <div class="row">
                <div class="col-md-5">
                    <a href="{{ $createRoute }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add <?=$admin ? 'Admin' : 'Agent'?>
                    </a>
                </div>


            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Referral Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                @if(!$admin)
                                <th>Customer Count</th>
                                @else
                                <th>Role</th>
                                @endif

                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->referral_code }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile_number }}</td>
                                     @if(!$admin)
                                    <td><u><a href="{{ url('customer') }}?agent={{ $user->id }}">{{  \App\Helper\Helper::getMyCustomer($user->id) }}</a></u></td>
                                    @else
                                    <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td>
                                    @endif
                                    <td>{{ $user->created_at ? date('d-m-Y',strtotime($user->created_at)) : '--' }}</td>
                                    <td>
                                        @if ($user->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($user->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>

                                    <td style="display: flex">
                                        <?php if($admin){
                                            $s1Route = route('admin.status', ['user_id' => $user->id, 'status' => 1]);
                                            $s2Route = route('admin.status', ['user_id' => $user->id, 'status' => 0]);
                                            $editRoute = route('admin.edit', ['user' => $user->id]);
                                            $domainRoute = "";
                                        } else {
                                            $s1Route = route('users.status', ['user_id' => $user->id, 'status' => 1]);
                                            $editRoute = route('users.edit', ['user' => $user->id]);
                                            $domainRoute = route('domain.edit', ['user' => $user->id]);
                                            $brandRoute = route('setting.brandingsfrm', ['id' => $user->id]);
                                            $smtpRoute = route('smtp.smtpfrm', ['id' => $user->id]);
                                            $paymentRoute = route('setting.paymentgatways', ['id' => $user->id]);
                                            $subscriptionRoute = route('agent.subscription', ['id' => $user->id]);
                                        } ?>
                                        @if ($user->status == 0)
                                          <!--  <a href="<?=$s1Route?>"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>-->
                                        @elseif ($user->status == 1)
                                            <?php if($admin){ ?>
                                          <!--  <a href="<?=$s2Route?>"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>-->
                                            <?php } else { ?>
                                          <!--  <select  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                              <option selected disabled>Reason for Deactivation</option>
                                              <option value="{{ route('users.status', ['user_id' => $user->id, 'status' => 0, 'reason' => 'Policy Violation']) }}">Policy Violation</option>
                                              <option value="{{ route('users.status', ['user_id' => $user->id, 'status' => 0, 'reason' => 'Non Payment']) }}">Non Payment</option>
                                            </select>-->
                                            <?php } ?>
                                        @endif
                                        <a href="<?=$editRoute?>"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        @if(collect(request()->segments())->last() == 'agent')
                                            <a href="<?=$domainRoute?>" class="btn btn-primary m-2"> <i class="fa fa-globe" aria-hidden="true"></i></a>
                                            <a class="btn btn-danger m-2 deleteBtn" href="#"  data-url="{{ route('admin.destroy', ['user' => $user->id]) }}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                                            <a href="<?=$brandRoute?>" class="btn btn-primary m-2"> Brand</a>
                                            <a href="<?=$smtpRoute?>" class="btn btn-primary m-2"> <i class="fas fa-envelope"></i></a>
                                            <a href="<?=$paymentRoute?>" class="btn btn-primary m-2"> <i class="fas fa-credit-card"></i></a>
                                            <a href="<?=$subscriptionRoute?>" class="btn btn-primary m-2">Subscription</a>
                                        @endif
                                        @if($user->role_id != 2)
                                           <a class="btn btn-danger m-2 deleteBtn" 
                                               href="#" 
                                               data-url="{{ route('admin.destroy', ['user' => $user->id]) }}"
                                               data-toggle="modal" 
                                               data-target="#deleteModal">
                                                <i class="fas fa-trash"></i>
                                            </a>
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

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Yes, Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>





<script>
    $(document).on("click", ".deleteBtn", function () {
        var url = $(this).data("url");
        $("#deleteForm").attr("action", url);
    });
</script>

<script>



    $('#example-table-theme').DataTable( {
       /*  layout: {
        topStart: 'buttons'
    },
    buttons: [
        { extend: 'excel', className: 'excelButton' }
    ]*/

         layout: {
        topStart: 'buttons'
    },
    buttons: [{ extend: 'csv', text: 'Export',className: 'excelButton' ,exportOptions: {
                columns: [0, 1,2,3,4,5,6]
               /* columns: 'th:not(:last-child)'*/
            } }]


/*
        layout: {
        topStart: {
            buttons: [  'csvHtml5']
        }
    }*/
} );

</script>
@endsection
