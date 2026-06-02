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
                            <td>Check Reports <a href="#" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a></td>
                            <td>{{ date('M d, Y H:i:s', strtotime($list->created_at)) }}</td>
                            <td>
                                @if($list->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">SCHEDULE</button>
                    <button type="submit" class="btn btn-primary">START NOW</button>
                    <!-- Add more form fields as needed -->
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
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
    $('#addCampaignModal').modal('show');
}
</script>
<script>
    @if(request()->has('action') && request()->get('action') == 'create')
        $('#addCampaignBtn').trigger('click');
    @endif
</script>

@endsection