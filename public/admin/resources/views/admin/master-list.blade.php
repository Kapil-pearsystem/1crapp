@extends('layouts.app')
<?php
use Illuminate\Support\Str;
?>
@section('title', 'General List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-0 text-gray-800">Master List </h1>
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


    @include('common.alert')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>&nbsp;<input type="checkbox" id="" name="" value=""></th>
                                <th>UNIQUE ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Address</th>
                                <!-- <th>Next Step</th> -->
                                <th>&ensp;&ensp;&ensp;&ensp;&ensp; Status &ensp;&ensp;&ensp;</th>
                                <!-- <th>Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td><input type="checkbox" id="" name="" value=""></td>
							<td>{{ $list->memberid }}</td>
							<!-- <td>{{ $list->source }}</td> -->
							<td>{{ $list->name }}</td>
							<td>{{ $list->email }}</td>
							<td>{{ $list->phone }}</td>
							<td>{{ $list->cdo_name }}</td>
							<td>{{ $list->address }}</td>
							<!-- <td>
                                <select class="form-control" onchange="nextStep(this,{{ $list->id }})">
                                    <option value="" selected disabled>Take Action</option>
                                    <option value="1">Send Link via Email</option>
                                    <option value="2">Send Link On Whatsapp</option>
                                    <option value="3">Book Manually</option>
                                </select>
                            </td> -->
							<td>
                                <select class="custom-select custom-select-sm" onchange="updateStatus(this.value,{{ $list->id }})">
                                    <option style="color: white; background-color: red;" value="0" @if($list->status == 0) selected @endif>Rejected</option>
                                    <option style="color: black; background-color: yellow;" value="1" @if($list->status == 1) selected @endif>Pending</option>
                                    <option style="color: white; background-color: blue;" value="2" @if($list->status == 2) selected @endif>In Progress</option>
                                    <option style="color: white; background-color: green;" value="3" @if($list->status == 3) selected @endif>Closed</option>
                                    <option style="color: black; background-color: gray;" value="4" @if($list->status == 4) selected @endif>Not Related</option>
                                    <option style="color: white; background-color: purple;" value="5" @if($list->status == 5) selected @endif>Accelerated</option>

                                </select>
                            </td>
							<!-- <td>{{ date('M d,Y',strtotime($list->created_at)) }}</td> -->
                            <td>
                                <!-- <a href="#" onclick="viewMessage({{ $list->id }})" class="btn btn-info bnt_alsss"  data-toggle="modal" data-target="#view_message"><i aria-hidden="true" class="fa fa-eye"></i></a> -->
								<a href="{{ route('customer.edit',[$list->customer_id]) }}" class="btn btn-primary bnt_alsss" ><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('delete-enquiry',[$list->id]) }}" onclick="return confirm('Are you sure you want to delete this tags?')" class="btn btn-danger bnt_alsss"><i aria-hidden="true" class="fas fa-trash-alt"></i></a>
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
         <h4 class="text-center text-info">General Message</h4><hr>
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
         <h5 class="text-center text-info next_step_heading">Take Action</h5><hr>
        <div class="tab-content p-3 next_step_data" style="min-height:200px;">

        </div>
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
<script>
       function updateStatus(status, id){
            // alert(status);
            $.ajax({
                url: '{{ route('update-enquiry-status') }}', // Define the correct route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function (response) {
                    $('#msg_id').text(response.message);
                    // alert(response.message); // Success message or perform some action
                },
                error: function (xhr) {
                    alert('Something went wrong!');
                }
            });
        }

</script>

<script>
    // Function to get the background color based on the selected value
    // function getStatusColor(status) {
    //     const colors = {
    //         0: 'red',         // Rejected
    //         1: 'yellow',      // Pending
    //         2: 'blue',        // In Progress
    //         3: 'green',       // Closed
    //         4: 'gray',        // Not Related
    //         5: 'purple'       // Accelerated
    //     };
    //     return colors[status] || 'white';
    // }
    // function updateBackgroundColor(selectElement) {
    //     const selectedValue = selectElement.value;
    //     selectElement.style.backgroundColor = getStatusColor(selectedValue);
    // }

    // document.querySelectorAll('select.custom-select').forEach(select => {
    //     const selectedValue = select.value;
    //     select.style.backgroundColor = getStatusColor(selectedValue);
    // });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<script>
    function viewMessage(id){
        $('.enquiry_message').html(spin_data());
        $.ajax({
            url: '{{ route('view-enquiry-message') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                $('.enquiry_message').text(response.message);
            },
            error: function (xhr) {
                alert('Something went wrong!');
            }
        });
    }
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
@endsection