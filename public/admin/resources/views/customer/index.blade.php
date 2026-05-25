@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" rel="stylesheet">

<style>
 .flt_liststs {
    float: right;
    display: flex;
}
.flt_liststs .flttrres {
    margin-right: 10px;
}
.flt_liststs .flttrres a {
    background: #f94554;
    padding: 5px 10px;
    color: #fff;
    font-size: 15px;
    border-radius: 4px;
    display: inline-block;
}
.flt_liststs .ftl_selctsss {
    margin-right: 10px;
}
.flt_liststs .ftl_selctsss:last-child {
    margin-right:0px;
}
.flt_liststs .ftl_selctsss select {
    padding: 4px;
    border: #ccc solid 1px;
    border-radius: 4px;
    font-size: 15px;
    cursor: pointer;
}
.flt_liststs .ftl_selctsss select:focus{outline:none;}


@media (min-width: 481px) and (max-width: 767px) {
	.flt_liststs {float: inherit; display: inline-block; margin-top: 10px; width: 100%;}
	.flt_liststs .flttrres {float: left;}
	.flt_liststs .ftl_selctsss:last-child {width: 100%; margin-top: 10px;}
	.flt_liststs .ftl_selctsss:last-child select {width: 100%;}
}

@media (min-width: 320px) and (max-width: 480px) {
	.flt_liststs {float: inherit; display: inline-block; margin-top: 10px; width: 100%;}
	.flt_liststs .flttrres {float: left;}
	.flt_liststs .ftl_selctsss:last-child {width: 100%; margin-top: 10px;}
	.flt_liststs .ftl_selctsss:last-child select {width: 100%;}
}
</style>
@section('content')
    <div class="container-fluid">
         <!-- Page Heading -->
		    <div class="row mb-4">
                <div class="col-lg-4">
                    <!--<h1 class="h3 mb-0 text-gray-800">Customer List @if(request('agent')) (Agent : {{ @$agentdetail->first_name }} {{ @$agentdetail->last_name }}) @endif</h1>-->
                    <h1 class="h3 mb-0 text-gray-800">Master List </h1><span class="text-muted">Filter Applied From: </span><span class="text-info">Customers</span>
                </div>
		        <div class="col-lg-8">
                    <div class="flt_liststs">
                        <div class="flttrres">
                            <a class="btn text-light" onclick="window.history.back();"><i class="fas fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="flttrres">
                                <a href="javascript:void(0);">Filters</a>
                        </div>
                        <div class="ftl_selctsss">
                                <select>
                                    <option value="">Add New Contacts</option>
                                    <option value="1">Add single contact</option>
                                    <option value="2">Import contacts</option>
                                </select>
                        </div>
                        <div class="ftl_selctsss">
                                <select>
                                    <option value="">Bulk Action</option>
                                    <option value="1">Select All  Contacts</option>
                                    <option value="2">Deselect All Contacts</option>
                                    <option value="3">Export Contacts</option>
                                    <option value="4">Delete Contacts</option>
                                    <option value="5">Add List/Lists</option>
                                    <option value="6">Add Tag/Tags</option>
                                </select>
                        </div>
                    </div>
			    </div>
			<span class="text-center text-success" id="msg_id"></span>
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
                                <th class="text-left">&nbsp;<input type="checkbox" id="" name="" value=""></th>
                                <th>Sr No.</th>
                                <th>UNIQUE ID</th>
                                <th>Name</th>
                                @if(!request('userid') && Auth()->user()->hasrole('Master Admin'))
                                <th>Agent Name (Member ID)</th>
                                @endif
                                <th>Email</th>
                                <th>Phone</th>
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
                                    <td class="text-left"><input type="checkbox" id="" name="" value=""></td>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->memberid }}</td>
                                    <td>{{ $user->name ? $user->name : '-' }}</td>
                                     @if(!request('userid')  && Auth()->user()->hasrole('Master Admin'))
                                     <td>{{ $user->first_name ? $user->first_name : '-' }} {{ $user->last_name ? $user->last_name : '-' }} {{ $user->company_id ? '('.$user->company_id.')' : '' }} </td>
                                     @endif
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile ? $user->mobile : '-' }}</td>
                                    <td> Check Now <a href="#"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a></td>
                                    <td>
                                        <select class="form-control" onchange="nextStep(this,{{ $user->id }})">
                                            <option value="" selected disabled>Take Action</option>
                                            <option value="1">Send Link via Email</option>
                                            <option value="2">Send Link On Whatsapp</option>
                                            <option value="3">Book Manually</option>
                                        </select>
                                    </td>
                                    <td>Check Now <a href="#"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a></td>
                                    <td>
                                        <select class="custom-select custom-select-sm" onchange="updateStatus(this.value,{{ $user->id }})">
                                            <option style="color: white; background-color: red;" value="0" @if($user->status == 0) selected @endif>Rejected</option>
                                            <option style="color: black; background-color: yellow;" value="1" @if($user->status == 1) selected @endif>Pending</option>
                                            <option style="color: white; background-color: blue;" value="2" @if($user->status == 2) selected @endif>In Progress</option>
                                            <option style="color: white; background-color: green;" value="3" @if($user->status == 3) selected @endif>Closed</option>
                                            <option style="color: black; background-color: gray;" value="4" @if($user->status == 4) selected @endif>Not Related</option>
                                            <option style="color: white; background-color: purple;" value="5" @if($user->status == 5) selected @endif>Accelerated</option>
                                        </select>
                                    </td>
                                    <?php  $editRoute = route('customer.edit', ['user' => $user->id]);
                                            $deleteRoute = route('customer.destroy', ['user' => $user->id]);
                                    ?>
									 <td>
                                            <a href="{{ $editRoute }}" class="btn btn-primary bnt_alsss"><i class="fa fa-pen"></i></a>
                                            <!--<a href="{{ $deleteRoute }}" class="btn btn-danger bnt_alsss delete-btn"><i class="fa fa-trash"></i></a>-->
                                        <!--@if(!request('userid') && Auth()->user()->hasrole('Master Admin'))-->
                                        <!--@endif-->
									 </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>
<script>
$('#example-table-theme').DataTable( {
    layout: {
        topStart: 'buttons'
    },
    buttons:
    [{ extend: 'csv', text: 'Export',className: 'excelButton' ,exportOptions: {
        columns: [1,2,3,4,5]
    } }]
} );
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script>
    // Function to get the background color based on the selected value
    function getStatusColor(status) {
        const colors = {
            0: 'red',         // Rejected
            1: 'yellow',      // Pending
            2: 'blue',        // In Progress
            3: 'green',       // Closed
            4: 'gray',        // Not Related
            5: 'purple'       // Accelerated
        };
        return colors[status] || 'white';
    }
    function updateBackgroundColor(selectElement) {
        const selectedValue = selectElement.value;
        selectElement.style.backgroundColor = getStatusColor(selectedValue);
    }

    document.querySelectorAll('select.custom-select').forEach(select => {
        const selectedValue = select.value;
        select.style.backgroundColor = getStatusColor(selectedValue);
    });
    
    
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
                user_type: 'customer',
                step: step,
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
                link: link,
                user_type: user_type,
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
@endsection
