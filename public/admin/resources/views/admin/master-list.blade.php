@extends('layouts.app')
<?php
use Illuminate\Support\Str;
?>
@section('title', 'Master List')
<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
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
<style>
    .open-btn {
      background: #D4537E;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
    }
    .open-btn:hover {
      background: #b83d66;
    }
    .modal-content {
      border: none;
      border-radius: 12px;
    }
    .filter-card {
      border: 1px solid #ececec;
      border-radius: 10px;
      padding: 18px;
      margin-bottom: 20px;
    }
    .sec-label {
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 15px;
      text-transform: uppercase;
    }
    .plus-btn {
      width: 100%;
      height: 42px;
      border: none;
      border-radius: 8px;
      background: #061c48;
      color: white;
      font-size: 22px;
    }
    .logic-sep {
      margin: 10px 0;
    }
    .logic-btn {
      padding: 5px 15px;
      border-radius: 20px;
      border: 1px solid #ddd;
      background: white;
      margin-right: 8px;
    }
    .logic-btn.active {
      background: #061c48;
      color: white;
      border-color: #061c48;
    }
    .condition-row {
      padding: 12px;
      background: #fafafa;
      border: 1px solid #eee;
      border-radius: 8px;
      margin-top: 10px;
    }
    .rm-btn {
      width: 35px;
      height: 35px;
      border: none;
      border-radius: 50%;
      background: white;
      font-size: 20px;
    }
    .output-box {
      margin-top: 20px;
      display: none;
      padding: 15px;
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
    }
  </style>
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>
        <div class="row mb-4">
                <div class="col-lg-5">
                <h3 class="h3 mb-0 text-gray-800">Master List </h3>
                @if($list_name)<span class="text-muted">Filter Applied With List: </span><span class="text-info">{{ $list_name }}</span>@endif
                @if($tag_name)<span class="text-muted">Filter Applied With Tag: </span><span class="text-info"> {{ $tag_name }}</span> @endif
                </div>
		        <div class="col-lg-7">
                    <div class="flt_liststs">
                        <div class="flttrres">
                                <a class="btn text-light" onclick="window.history.back();"><i class="fas fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="flttrres">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#filterModal">Filters</a>
                        </div>
                        <div class="ftl_selctsss">
                                <select>
                                    <option value="">Add New Contacts</option>
                                    <option value="1">Add single contact</option>
                                    <option value="2">Import contacts</option>
                                </select>
                        </div>
                        <div class="ftl_selctsss">
                            <select name="bulk_action" onchange="setBulkAction(this.value)">
                                <option value="">Bulk Action</option>
                                <!-- <option value="1">Select All  Contacts</option>
                                <option value="2">Deselect All Contacts</option>
                                <option value="3">Export Contacts</option> -->
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
                                <th>&nbsp;<input type="checkbox" id="select-all"></th>
                                <th>UNIQUE ID</th>
                                <th>Name port Ticket</th>
                                <!-- <th>Email</th> -->
                                <!-- <th>Phone</th>
                                <th>Company</th>
                                <th>Source</th>
                                <th>Request For</th>
                                <th>Services Taken</th>
                                <th>Next Step</th>
                                <th>Support Ticket</th> -->
                                <th>Date</th>
                                <th>&ensp;&ensp;&ensp;&ensp;&ensp; Status &ensp;&ensp;&ensp;</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="master-list-body">
                            @include('admin.master-list-table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="filterModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Advanced Filters</h5>
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <!-- Included -->
            <div class="filter-card">
            <div class="sec-label">
                Included Conditions
            </div>
            <div class="form-row">
                <div class="col-md-5">
                <select id="inc-type" class="form-control" onchange="onTypeChange('inc')">
                    <option value="">
                    Select Type
                    </option>
                    <option value="list">
                    Contact List
                    </option>
                    <option value="tag">
                    Tags
                    </option>
                </select>
                </div>
                <div class="col-md-5">
                <select id="inc-val" class="form-control d-none">
                    <option value="">
                    Select Value
                    </option>
                </select>
                </div>
                <div class="col-md-2">
                <button class="plus-btn" onclick="addCond('inc')">
                    +
                </button>
                </div>
            </div>
            <div id="inc-conds">
            </div>
            </div>
            <!-- Excluded -->
            <div class="filter-card">
            <div class="sec-label">
                Excluded Conditions
            </div>
            <div class="form-row">
                <div class="col-md-5">
                <select id="exc-type" class="form-control" onchange="onTypeChange('exc')">
                    <option value="">
                    Select Type
                    </option>
                    <option value="list">
                    Contact List
                    </option>
                    <option value="tag">
                    Tags
                    </option>
                </select>
                </div>
                <div class="col-md-5">
                <select id="exc-val" class="form-control d-none">
                    <option value="">
                    Select Value
                    </option>
                </select>
                </div>
                <div class="col-md-2">
                <button class="plus-btn" onclick="addCond('exc')">
                    +
                </button>
                </div>
            </div>
            <div id="exc-conds">
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline-secondary" onclick="resetAll()">Reset</button>
            <button class="btn open-btn" onclick="applyFilters()">Apply </button>
        </div>
        </div>
    </div>
</div>
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
         <h4 class="text-center text-info">View Details</h4><hr>
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
<div class="modal fade" id="bulk_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: 2px solid #3200af; border-radius: 8px; position: relative;">
            <div class="modal-body">
                <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" style=" float: right; background-color: #2300af; color: #fff; border: none; width: 30px; height: 30px; border-radius: 50%; font-size: 25px; display: flex; align-items: center; justify-content: center;">
                    <span>&times;</span>
                </button>
                <h4 class="modal-title mb-3">Bulk Action</h4>
                <form id="disable_booking_form" method="POST" action="{{ route('master.list.delete') }}">
                    @csrf
                    <input type="hidden" name="list_ids" class="list_ids">
                    <div class="form-group" id="bulk_delete_field">
                        <pquote>Are you sure you want to delete these customers?</quote>
                    </div>
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bulk_listAssign_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: 2px solid #3200af; border-radius: 8px; position: relative;">
            <div class="modal-body">
                <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" style=" float: right; background-color: #2300af; color: #fff; border: none; width: 30px; height: 30px; border-radius: 50%; font-size: 25px; display: flex; align-items: center; justify-content: center;">
                    <span>&times;</span>
                </button>
                <h4 class="modal-title mb-3">Assign List to selected customers</h4>
                <form id="disable_booking_form" method="POST" action="{{ route('master.list.assign-list') }}">
                    @csrf
                    <input type="hidden" name="list_ids" class="list_ids">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Select List</label>
                            <div class="border rounded p-3"
                                style="max-height:250px;overflow-y:auto;">
                                <div class="form-check mb-2">
                                    <input type="checkbox"
                                        id="check-all-contact-list"
                                        class="form-check-input">
                                    <label class="form-check-label"
                                        for="check-all-contact-list">
                                        Select All
                                    </label>
                                    <span id="assign-new-list"
                                        class="text-primary"
                                        style="float:right;cursor:pointer;">
                                        + Assign New
                                    </span>
                                </div>
                                <hr>
                                @foreach($contacts as $contact)
                                <div class="form-check mb-2">
                                    <input type="checkbox"
                                        name="contact_id[]"
                                        value="{{ $contact->id }}"
                                        id="contact_{{ $contact->id }}"
                                        class="form-check-input contact-checkbox">
                                    <label class="form-check-label"
                                        for="contact_{{ $contact->id }}">
                                        {{ $contact->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="assign-new-field-list mt-3" style="display:none;">
                                <div id="new-list-wrapper">
                                    <div class="input-group mb-2">
                                        <input type="text"
                                            name="newList[]"
                                            class="form-control"
                                            placeholder="Enter new list">
                                        <div class="input-group-append">
                                            <button type="button"
                                                    class="btn btn-success add-list">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign</button>
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bulk_tagAssign_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: 2px solid #3200af; border-radius: 8px; position: relative;">
            <div class="modal-body">
                <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" style=" float: right; background-color: #2300af; color: #fff; border: none; width: 30px; height: 30px; border-radius: 50%; font-size: 25px; display: flex; align-items: center; justify-content: center;">
                    <span>&times;</span>
                </button>
                <h4 class="modal-title mb-3">Assign Tag to selected customers</h4>
                <form id="disable_booking_form" method="POST" action="{{ route('master.list.assign-tag') }}">
                    @csrf
                    <input type="hidden" name="list_ids" class="list_ids">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Select List</label>
                            <div class="border rounded p-3"
                                style="max-height:250px;overflow-y:auto;">
                                <div class="form-check mb-2">
                                    <input type="checkbox"
                                        id="check-all-tag"
                                        class="form-check-input">
                                    <label class="form-check-label"
                                        for="check-all-tag">
                                        Select All
                                    </label>
                                    <span id="assign-new-tag"
                                        class="text-primary"
                                        style="float:right;cursor:pointer;">
                                        + Assign New
                                    </span>
                                </div>
                                <hr>
                                @foreach($tags as $tag)
                                <div class="form-check mb-2">
                                    <input type="checkbox"
                                        name="tag_id[]"
                                        value="{{ $tag->id }}"
                                        id="tag_{{ $tag->id }}"
                                        class="form-check-input tag-checkbox">
                                    <label class="form-check-label"
                                        for="tag_{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="assign-new-field-tag mt-3" style="display:none;">
                                <div id="new-tag-wrapper">
                                    <div class="input-group mb-2">
                                        <input type="text"
                                            name="newTag[]"
                                            class="form-control"
                                            placeholder="Enter new tag">
                                        <div class="input-group-append">
                                            <button type="button"
                                                    class="btn btn-success add-tag">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign</button>
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#filterModal').on(
            'shown.bs.modal',
            function(){
                $('.select2').select2({
                    dropdownParent:
                    $('#filterModal'),
                    width:'100%'
                });
            }
        );
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
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script>
     function viewMessage(el) {
        const data = JSON.parse(el.getAttribute('data-message'));
        // console.log(data);
         $('.enquiry_message').html(spin_data());
        var htmlData = `<p><strong>Name: </strong>${data.name}</p>
                        <p><strong>Email: </strong>${data.email}</p>
                        <p><strong>Phone: </strong>${data.phone}</p>
                        <p><strong>Company: </strong>${data.cdo_name}</p>
                        <p><strong>Source: </strong>${data.source}</p>
                        <p><strong>Request For: </strong>${data.ps_name}</p>
                        <hr>
                        <p><strong>Message: </strong></p>
                        <p>${data.message}</p>`;
        $('.enquiry_message').html(htmlData);
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
                user_type: 'customer',
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
<script>
new DataTable('#example-table-theme', {
    paging: true,
    columnDefs: [
        {
            targets: 1,
            orderable: false
        }
    ],
    layout: {
        topStart: {
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy'
                },
                {
                    extend: 'csv',
                    text: 'CSV'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF'
                },
                {
                    extend: 'print',
                    text: 'Print'
                }
            ]
        }
    }
});
</script>
<script>
    /* Laravel data */
    const opts = {
      list: [
        @foreach($contacts as $contact)
        {
          id: "{{ $contact->id }}",
          name: "{{ $contact->name }}"
        },
        @endforeach
      ],
      tag: [
        @foreach($tags as $tag)
        {
          id: "{{ $tag->id }}",
          name: "{{ $tag->name }}"
        },
        @endforeach
      ]
    };
    const labels = {
      list: 'Contact List',
      tag: 'Tags'
    };
    let state = {
      inc: [],
      exc: []
    };
    let uid = 0;
    function onTypeChange(prefix) {
      let type = $("#" + prefix + "-type").val();
      let box = $("#" + prefix + "-val");
      if (!type) {
        box.addClass("d-none");
        return;
      }
      box.html(
        '<option value="">Select Value</option>'
      );
      opts[type].forEach(item => {
        box.append(
          `<option value="${item.id}">
${item.name}
</option>`
        );
      });
      box.removeClass("d-none");
    }
    function addCond(prefix) {
      let type = $("#" + prefix + "-type").val();
      let val = $("#" + prefix + "-val").val();
      if (!type || !val) {
        alert(
          'Select type and value'
        );
        return;
      }
      state[prefix].push({
        id: uid++,
        type: type,
        val: val,
        logic: 'AND'
      });
      render(prefix);
    }
    function render(prefix) {
      let html = '';
      state[prefix].forEach((item, index) => {
        if (index > 0) {
          html += `
<div class="logic-sep">
<button
class="logic-btn ${item.logic == 'AND' ? 'active' : ''}"
onclick="setLogic(
'${prefix}',
${item.id},
'AND'
)">
AND
</button>
<button
class="logic-btn ${item.logic == 'OR' ? 'active' : ''}"
onclick="setLogic(
'${prefix}',
${item.id},
'OR'
)">
OR
</button>
</div>
`;
        }
        html += `
<div class="condition-row">
<div class="form-row align-items-center">
<div class="col-md-4">
<select class="form-control"
onchange="
changeType(
'${prefix}',
${item.id},
this.value
)
">
${Object.entries(labels)
            .map(([k, v]) =>
              `<option
value="${k}"
${item.type == k ? 'selected' : ''}>
${v}
</option>`
            ).join('')}
</select>
</div>
<div class="col-md-7">
<select class="form-control"
onchange="
changeVal(
'${prefix}',
${item.id},
this.value
)
">
<option value="">
Select Value
</option>
${opts[item.type]
            .map(v =>
              `<option
value="${v.id}"
${v.id == item.val ? 'selected' : ''}>
${v.name}
</option>`
            ).join('')}
</select>
</div>
<div class="col-md-1">
<button class="rm-btn"
onclick="
removeCond(
'${prefix}',
${item.id}
)
">
×
</button>
</div>
</div>
</div>
`;
      });
      $("#" + prefix + "-conds").html(html);
    }
    function setLogic(
      prefix,
      id,
      logic
    ) {
      state[prefix]
        .find(
          x => x.id == id
        ).logic = logic;
      render(prefix);
    }
    function changeType(
      prefix,
      id,
      type
    ) {
      let item = state[prefix]
        .find(
          x => x.id == id
        );
      item.type = type;
      item.val = '';
      render(prefix);
    }
    function changeVal(
      prefix,
      id,
      val
    ) {
      state[prefix]
        .find(
          x => x.id == id
        ).val = val;
    }
    function removeCond(
      prefix,
      id
    ) {
      state[prefix] = state[prefix]
        .filter(
          x => x.id != id
        );
      render(prefix);
    }
    function resetAll() {
      state = {
        inc: [],
        exc: []
      };
      render('inc');
      render('exc');
      $("#output-box").hide();
    }
    // function applyFilters() {
    //   let payload = {
    //     included: state.inc,
    //     excluded: state.exc
    //   };
    //   $("#output-text").text(JSON.stringify(payload, null, 4));
    //   $("#output-box").show();
    //   $("#filterModal").modal('hide');
    //   console.log(payload);
    // }
    function applyFilters()
    {
        let payload = {
            included: state.inc,
            excluded: state.exc
        };
        $.ajax({
            url: "{{ route('master.list.filter') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                filters: JSON.stringify(payload)
            },
            beforeSend: function () {
                $("#master-list-body").html(
                    `<tr>
                        <td colspan="7">
                            Loading...
                        </td>
                    </tr>`
                );
            },
            success: function (response) {
                $("#master-list-body")
                    .html(response);
                $("#filterModal")
                    .modal('hide');
            },
            error: function () {
                alert(
                    "Something went wrong"
                );
            }
        });
    }
  </script>
<script>
$(document).ready(function(){
    $(document).on(
        'change',
        '#select-all',
        function(){
        $('.list-checkbox')
            .prop(
                'checked',
                $(this).prop('checked')
            );
        }
    );
    /*
    Single checkbox
    */
    $(document).on('change', '.list-checkbox',
        function(){
            let total = $('.list-checkbox').length;
            let checked = $('.list-checkbox:checked').length;
            $('#select-all').prop('checked', total === checked);
        }
    );
    /*
    Get selected IDs
    */
    /*
    Example button click
    */
    // $('#bulk-action-btn').click(function(){
    //     let selectedIds =
    //     getSelectedIds();
    //     console.log(selectedIds);
    //     if(selectedIds.length == 0)
    //     {
    //         alert('Please select records');
    //         return;
    //     }
    //     /*
    //     AJAX example
    //     $.ajax({
    //         url:'your-route',
    //         type:'POST',
    //         data:{
    //             _token:'{{ csrf_token() }}',
    //             ids:selectedIds
    //         }
    //     });
    //     */
    // });
});
function getSelectedIds(){
    let ids = [];
    $('.list-checkbox:checked')
        .each(function(){
            ids.push($(this).val());
        });
    return ids;
}
function setBulkAction(action){
    let selectedIds = getSelectedIds();
    console.log(selectedIds);
    if(selectedIds.length == 0)
    {
        alert('Please select records');
        return;
    }
    $('.list_ids').val(selectedIds.join(','));
    if(action == '4'){
        $('#bulk_delete_modal').modal('show');
        // alert('Delete action selected. Implement delete functionality here.');
    } else if(action == '5'){
        $('#bulk_listAssign_modal').modal('show');
        // alert('Add to List action selected. Implement add to list functionality here.');
    } else if(action == '6'){
        $('#bulk_tagAssign_modal').modal('show');
        // alert('Add Tag action selected. Implement add tag functionality here.');
    }
}
$(document).on('click', '.close-btn', function () {
    $(this).closest('.modal').modal('hide');
});
</script>
<script>
    $(document).ready(function(){

    $('#check-all-contact-list').on('change',function(){

        $('.contact-checkbox').prop(
            'checked',
            $(this).prop('checked')
        );
    });
    $('.contact-checkbox').on('change',function(){
        let total=$('.contact-checkbox').length;
        let checked=$('.contact-checkbox:checked').length;
        $('#check-all-contact-list').prop(
            'checked',
            total===checked
        );
    });
    $('#assign-new-list').click(function(){
        $('.assign-new-field-list').show();
    });

    $(document).on(
        'click',
        '.add-list',
        function(){
            let html=`
            <div class="input-group mb-2">
                <input type="text"
                       name="newList[]"
                       class="form-control"
                       placeholder="Enter new list">
                <div class="input-group-append">
                    <button type="button"
                            class="btn btn-danger remove-list">
                        ×
                    </button>
                </div>
            </div>`;
            $('#new-list-wrapper')
                .append(html);
        }
    );
    $(document).on(
        'click',
        '.remove-list',
        function(){
            $(this)
            .closest('.input-group')
            .remove();
        }
    );
});
</script>

<script>
    $(document).ready(function(){
    $('#check-all-tag').on('change',function(){
        $('.tag-checkbox').prop(
            'checked',
            $(this).prop('checked')
        );
    });
    $('.tag-checkbox').on('change',function(){
        let total=$('.tag-checkbox').length;
        let checked=$('.tag-checkbox:checked').length;
        $('#check-all-tag').prop(
            'checked',
            total===checked
        );
    });
    $('#assign-new-tag').click(function(){
        $('.assign-new-field-tag').show();
    });
    $(document).on(
        'click',
        '.add-tag',
        function(){
            let html=`
            <div class="input-group mb-2">
                <input type="text"
                       name="newTag[]"
                       class="form-control"
                       placeholder="Enter new tag">
                <div class="input-group-append">
                    <button type="button"
                            class="btn btn-danger remove-tag">
                        ×
                    </button>
                </div>
            </div>`;
            $('#new-tag-wrapper')
                .append(html);
        }
    );
    $(document).on(
        'click',
        '.remove-tag',
        function(){
            $(this)
            .closest('.input-group')
            .remove();
        }
    );
});
</script>
@endsection