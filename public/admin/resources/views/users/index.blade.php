<?php
if ($admin) {
    $createRoute = route('admin.create');
    $expotRoute = route('admin.export');
} else {
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
        <h1 class="h3 mb-0 text-gray-800"><?= $admin ? 'Admin' : 'Agents' ?> List</h1>
        <div class="row">
            <div class="col-md-5">
                <a href="{{ $createRoute }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add <?= $admin ? 'Admin' : 'Agent' ?>
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
                            <th>Services Taken</th>
                            <th>Next Step</th>
                            <th>Support Ticket</th>
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
                            <td><u><a href="{{ url('master-list') }}?agent={{ $user->id }}">{{ \App\Helper\Helper::getMyCustomer($user->id) }}</a></u></td>
                            @else
                            <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td>
                            @endif
                            <td>{{ $user->created_at ? date('d-m-Y',strtotime($user->created_at)) : '--' }}</td>
                            <td>
                                Check Now <a href="#"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <select class="form-control" onchange="nextStep(this,{{ $user->id }})">
                                    <option value="" selected disabled>Take Action</option>
                                    <option value="1">Send Link via Email</option>
                                    <option value="2">Send Link On Whatsapp</option>
                                    <option value="3">Book Manually</option>
                                </select>
                            </td>
                            <td>
                                Check Now <a href="#"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                @if ($user->status == 0)
                                <span class="badge badge-danger">Inactive</span>
                                @elseif ($user->status == 1)
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <?php
                                if ($admin) {
                                    $s1Route = route('admin.status', ['user_id' => $user->id, 'status' => 1]);
                                    $s2Route = route('admin.status', ['user_id' => $user->id, 'status' => 0]);
                                    $editRoute = route('admin.edit', ['user' => $user->id]);
                                } else {
                                    $s1Route = route('users.status', ['user_id' => $user->id, 'status' => 1]);
                                    $editRoute = route('users.edit', ['user' => $user->id]);
                                    $domainRoute = route('domain.edit', ['user' => $user->id]);
                                    $brandRoute = route('setting.brandingsfrm', ['id' => $user->id]);
                                    $smtpRoute = route('smtp.smtpfrm', ['id' => $user->id]);
                                    $paymentRoute = route('setting.paymentgatways', ['id' => $user->id]);
                                    $subscriptionRoute = route('agent.subscription', ['id' => $user->id]);
                                }
                                ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- Edit -->
                                        <a href="<?= $editRoute ?>" class="dropdown-item" target="_blank"><i class="fa fa-pen mr-2"></i> Edit</a>
                                        @if(collect(request()->segments())->last() == 'agent')
                                        <a href="<?= $domainRoute ?>"class="dropdown-item" target="_blank"><i class="fa fa-globe mr-2"></i> Domain</a>
                                        <a href="<?= $brandRoute ?>" class="dropdown-item"><i class="fa fa-paint-brush mr-2"></i> Brand</a>
                                        <a href="<?= $smtpRoute ?>"
                                            class="dropdown-item" target="_blank">
                                            <i class="fas fa-envelope mr-2"></i>
                                            SMTP
                                        </a>
                                        <a href="<?= $paymentRoute ?>"
                                            class="dropdown-item">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Payment Gateway
                                        </a>
                                        <a href="<?= $subscriptionRoute ?>"
                                            class="dropdown-item" target="_blank">
                                            <i class="fa fa-list mr-2"></i>
                                            Subscription
                                        </a>
                                        @endif
                                        <!-- Activate -->
                                        @if($user->status == 0)
                                        <a href="<?= $s1Route ?>"
                                            class="dropdown-item text-success" target="_blank">
                                            <i class="fa fa-check mr-2"></i>
                                            Activate
                                        </a>
                                        @endif
                                        <!-- Deactivate -->
                                        <!-- @if($user->status == 1 && !$admin)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                            href="{{ route('users.status',['user_id'=>$user->id,'status'=>0,'reason'=>'Policy Violation']) }}">
                                            Policy Violation
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('users.status',['user_id'=>$user->id,'status'=>0,'reason'=>'Non Payment']) }}">
                                            Non Payment
                                        </a>
                                        @endif -->
                                        <!-- Delete -->
                                        @if($user->role_id != 1)
                                        <div class="dropdown-divider"></div>
                                        <a href="#"
                                            class="dropdown-item text-danger deleteBtn"
                                            data-url="{{ route('admin.destroy',['user'=>$user->id]) }}"
                                            data-toggle="modal"
                                            data-target="#deleteModal">
                                            <i class="fas fa-trash mr-2"></i>
                                            Delete
                                        </a>
                                        @endif
                                    </div>
                                </div>
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

    <!-- Modal -->
<div class="modal fade " id="view_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body position-relative">
        <!-- Close Button -->
        <button type="button" class="btn btn-primary rounded-circle border-2 position-absolute close" data-dismiss="modal"  aria-label="Close"
          style="top: 10px; right: 10px; width: 40px; height: 40px;">
          <span aria-hidden="true">&times;</span>
        </button>

        <!-- Tab Content -->
         <h4 class="text-center text-info">Enquiry Message</h4><hr>
        <div class="tab-content p-3 enquiry_message" style="min-height:200px;">
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Modal -->
<div class="modal fade " id="next_step" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="border:2px solid blue;">
      <div class="modal-body position-relative">
        <!-- Close Button -->
        <button type="button" class="btn btn-primary rounded-circle border-2 position-absolute close" onclick="closeModal()" data-dismiss="modal"  aria-label="Close"
          style="top: 10px; right: 10px; width: 40px; height: 40px;">
          <span aria-hidden="true">&times;</span>
        </button>

        <!-- Tab Content -->
         <h4 class="text-center text-info next_step_heading text-bold">Take Action</h4><hr>
        <div class="tab-content p-3 next_step_data" style="min-height:200px;">

        </div>
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
    $(document).on("click", ".deleteBtn", function() {
        var url = $(this).data("url");
        $("#deleteForm").attr("action", url);
    });
</script>
<script>
    $('#example-table-theme').DataTable({
        /*  layout: {
        topStart: 'buttons'
    },
    buttons: [
        { extend: 'excel', className: 'excelButton' }
    ]*/
        layout: {
            topStart: 'buttons'
        },
        buttons: [{
            extend: 'csv',
            text: 'Export',
            className: 'excelButton',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
                /* columns: 'th:not(:last-child)'*/
            }
        }]
        /*
                layout: {
                topStart: {
                    buttons: [  'csvHtml5']
                }
            }*/
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<script>
    function nextStep(stepValue, id){
        $('.next_step_data').html(spin_data());
        const step = stepValue.value;
        $('.next_step_heading').html(stepValue.options[stepValue.selectedIndex].text);
        // alert(stepText);
        $.ajax({
            url: '{{ route('next-step-data') }}', // Define the correct route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                step: step,
                user_type: 'agent',
                id: id,
            },
            success: function (response) {
                if(response.status == true){
                    $('.next_step_data').html(response.data);
                }else{
                    $('.next_step_data').html(response.msg);
                }
            },
            error: function (xhr) {
                alert('Something went wrong!');
            }
        });
        var $j = jQuery.noConflict();
        $j('#next_step').modal('show');
    }
    // if(step == 1){

    // }
        // alert(step);
    function closeModal(){
        var $j = jQuery.noConflict();
        $j('#next_step').modal('hide');
    }

</script>
<script>
   function spin_data() {
    return `
       <div class=="text-center"> <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>`;
}

</script>
<script>
    function setDestination(type){
    $.ajax({
        url: '{{ route('form.get-destination') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            type: type,
        },
        success: function (response) {
            if(response.status == true){
                $('#destination_id').html(response.data);
            } else {
                let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}

function getWhatsappLink(){
    // $('.next_step_data').html(spin_data());
    var id = document.wf1.customer_id.value;
    var link = document.wf1.success_destination.value;
    var message = document.wf1.message.value;
    var user_type = document.wf1.user_type.value;
    $.ajax({
        url: '{{ route('get-whatsapp-link') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            message: message,
            user_type: user_type,
            link: link,
            id: id,
        },
        success: function (response) {
            if(response.status == true){
                $('.next_step_data').html(response.data);
            }else{
                $('.next_step_data').html(response.msg);
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
    return false;
}
</script>
@endsection