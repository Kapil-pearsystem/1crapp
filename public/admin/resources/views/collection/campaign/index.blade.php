<?php
use Illuminate\Support\Str;
?>
@extends('layouts.app')
@section('title', 'Campaign List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Campaign List</h1>
        <div class="row float-left">
            <div class="col-md-12">
                <a href="{{ route('collection.index') }}" class="btn btn-sm btn-primary"> Collection</a>
                <a href="{{ route('gift.index') }}" class="btn btn-sm btn-primary">Gift List</a>
                <a href="{{ route('gift.category-list') }}" class="btn btn-sm btn-primary">Gift Category</a>
                <a href="{{ route('gift.thank-you-card-list') }}" class="btn btn-sm btn-primary">Thank You Cards</a>
                <a href="{{ route('gift.config.index') }}" class="btn btn-sm btn-primary">Gift Configuration</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCampaignModal" id="addCampaignBtn"><i aria-hidden="true" class="fas fa-plus"></i> Add Campaign</a>
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
                            <th>Campaign Name</th>
                            <th>Assigned List</th>
                            <th>Sequence Name</th>
                            <th>Campaign ID</th>
                            <th>Report</th>
                            <th>Start Date/Time</th>
                            <th>Current Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->list->name }}</td>
                            <td>{{ $list->collection->title }}</td>
                            <td>{{ $list->campaign_id }}</td>
                            <td>Check Reports <a href="{{ route('collection.campaigns.report', ['id' => $collection->id, 'camp_id' => $list->id]) }}" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a></td>
                            <td>{{ $list->start_date ? date('M d, Y', strtotime($list->start_date)) : 'Not scheduled' }}{{ $list->time_of_day ? ' at ' . date('h:i A', strtotime($list->time_of_day)) : '' }}</td>
                            <td class="text-center">
                                @if($list->status == 1)
                                <span class="badge badge-success" style="cursor:pointer; padding: 5px;" onclick="changeStatus({{ $list->id }}, 2)" data-toggle="modal" data-target="#campaignStatusModal">Running</span>
                                @elseif($list->status == 2)
                                <span class="badge badge-warning" style="cursor:pointer; padding: 5px;" onclick="changeStatus({{ $list->id }}, 0)" data-toggle="modal" data-target="#campaignStatusModal">Paused</span>
                                @else
                                <span class="badge badge-danger" style="cursor:pointer; padding: 5px;" onclick="changeStatus({{ $list->id }}, 1)" data-toggle="modal" data-target="#campaignStatusModal">Inactive</span>
                                @endif
                            </td>
                            <td>
                               
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addCampaignModal" onclick='editCampaign(@json($list))' class="dropdown-item"><i class="fa fa-pen mr-2"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#"
                                            class="dropdown-item text-danger deleteBtn"
                                             onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('collection.campaigns.delete',['id' => $collection->id, 'camp_id' => $list->id]) }}'; }">
                                            <i class="fas fa-trash mr-2"></i>
                                            Delete
                                        </a>
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
<!-- Button trigger modal -->
 
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="addCampaignModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title campaign-title">Add Campaign</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="addCampaignForm" method="POST" action="{{ route('collection.campaigns.save', $collection->id) }}">
                    @csrf
                    <input type="hidden" name="id" id="campaignId">
                    <div class="form-group">
                        <label for="campaignName">Campaign Name</label>
                        <input type="text" class="form-control" id="campaignName" name="title" placeholder="Enter campaign name" required>
                    </div>
                    <div class="form-group">
                        <label for="assignedList">Assigned List</label>
                        <select class="form-control" id="assignedList" name="list_id" required onchange="getContactCount(this.value)">
                            <option value="">Select List</option>
                            @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row border-top pt-3">
                        <label for="totalContacts" class="col-sm-8 col-form-label">Total Contacts in this List</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="totalContacts" name="total_contacts" readonly>
                        </div>
                    </div>
                    <div class="form-group row border-top pt-3">
                        <label for="costPerContact" class="col-sm-8 col-form-label">Cost of delivery for a contact</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="costPerContact" name="cost_per_contact" value="{{ $collection->gross_amount }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row border-top pt-3">
                        <label for="totalCost" class="col-sm-8 col-form-label">Gross cost for <span id="selectedContacts">0</span> contacts</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" id="totalCost" name="total_cost" readonly>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="scheduleLater" name="schedule_later">
                        <label class="form-check-label" for="scheduleLater">Schedule for later</label>
                    </div>
                    <div class="form-group schedule-fields" style="display: none;">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="start_date" >
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <!-- <button type="submit" class="btn btn-primary">SCHEDULE</button> -->
                    <button type="submit" class="btn btn-primary" id="saveCampaignBtn">SAVE NOW</button>
                    <!-- Add more form fields as needed -->
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="campaignStatusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title campaign-title">Campaign Status</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="updateStatusForm" method="POST" action="{{ route('collection.campaigns.update-status', $collection->id) }}">
                    @csrf
                    <input type="hidden" name="id" id="campaignStatusId">
                    <input type="hidden" name="status" id="campaignStatus">
                    <p id="campaignStatusMessage"></p>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <!-- <button type="submit" class="btn btn-primary">SCHEDULE</button> -->
                    <button type="submit" class="btn btn-primary" id="saveStatusBtn">START NOW</button>
                    <button type="button" class="btn btn-info d-none" id="resumeStatusBtn" onclick="resumeCampaign(this)">Resume Campaign</button>
                    <!-- Add more form fields as needed -->
                </form>
                
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')<!-- jQuery 3.7.1 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
    $('#scheduleLater').change(function () {
        $('.schedule-fields').toggle(this.checked);
        $('#saveCampaignBtn').text(this.checked ? 'SAVE NOW' : 'SAVE NOW');
        $('#startDate').prop('required', this.checked);

        if (!this.checked) {
            $('#startDate').val('');
        }
    });

    
});
function changeStatus(campaignId, newStatus) {
    // alert(campaignId);
    $('#resumeStatusBtn').addClass('d-none');
    $('#campaignStatusId').val(campaignId);
    $('#campaignStatus').val(newStatus);
    var statusText = 'Change';
    if(newStatus == 1) {
        $('#saveStatusBtn').text('Start Campaign');
        statusText = 'Start';
    } else if(newStatus == 2){
        $('#saveStatusBtn').text('Pause Campaign');
        statusText = 'Pause';
    } else {
        $('#resumeStatusBtn').removeClass('d-none');
        $('#saveStatusBtn').text('Deactivate Campaign');
        statusText = 'Deactivate';
    }
    $('#campaignStatusMessage').text('Are you sure you want to ' + statusText + ' this campaign?');
}
function resumeCampaign(button) {
    $('#campaignStatus').val(1);
    button.form.submit();
}
</script>
<script>
function getContactCount(listId) {
    var costPerContact = parseFloat($('#costPerContact').val());
    if(listId) {
        $.ajax({
            url: "{{ route('collection.campaigns.get-contact-count', $collection->id) }}",
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': listId
            },
            success: function(response) {
                $('#totalContacts').val(response.count);
                $('#selectedContacts').text(response.count);
                $('#totalCost').val((response.count * costPerContact).toFixed(2));
            }
        });
    } else {
        $('#totalContacts').val('');
        $('#selectedContacts').text('0');
        $('#total_cost').val('');
    }
}

//edit campaign
function editCampaign(campaign) {
    $('.campaign-title').text('Edit Campaign');
    $('#campaignId').val(campaign.id);
    $('#campaignName').val(campaign.title);
    $('#assignedList').val(campaign.list_id).change();
    if(campaign.start_date) {
        $('#scheduleLater').prop('checked', true).change();
        $('#startDate').val(formatDate(campaign.start_date));
    } else {
        $('#scheduleLater').prop('checked', false).change();
    }
}
function formatDate(dateStr) {
    var date = new Date(dateStr);
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);
    return year + '-' + month + '-' + day;
}
</script>
<script>
    @if(request()->has('action') && request()->get('action') == 'create')
        document.getElementById('addCampaignBtn').click();
    @endif
</script>

@endsection