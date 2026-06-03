@extends('layouts.app')
@section('title', 'Campaign Report')
@section('content')
@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
@endphp
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h5 mb-0 text-dark">Campaign Report: {{ $campaign->title }}</h5>
        <div class="row float-left">
            <div class="col-md-12">
                <a href="{{ route('collection.campaigns.index', $collection->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left" aria-hidden="true"></i> Back to Campaigns</a>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 mb-4">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <p><strong>Campaign Summary:</strong> {{ $campaign->title }}</p>
                    <p><strong>Campaign ID:</strong> #{{ $campaign->campaign_id }}</p>
                    <p><strong>Start Date:</strong> {{ $campaign->start_date ? date('M d, Y', strtotime($campaign->start_date)) : 'Not scheduled' }}</p>
                </div>

                <div class="card-body">
                    <div class="row no-gutters">

                        <div class="col border text-center p-3">
                            <div class="col-auto mb-2">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $campaign->list_count }}
                            </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Contacts
                            </div>
                            <small>
                                <a class="text-decoration-underline" href="{{ route('lists.index') }}" target="_blank">
                                     
                                    See The List of contacts >>
                                </a>
                            </small>
                        </div>

                        <div class="col border text-center p-3">
                            <div class="col-auto mb-2">
                                <i class="fas fa-gift fa-2x text-gray-300"></i>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $collection->gifts_count }}
                            </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Gift in This Sequence
                            </div>
                            <!-- <small class="text-muted">
                                Total agents targeted in this campaign.
                            </small> -->
                        </div>

                        <div class="col border text-center p-3">
                            <div class="col-auto mb-2">
                                <i class="fas fa-gifts fa-2x text-gray-300"></i>
                            </div>
                            <div class="row">
                                <div class="col-6 h5 mb-0 font-weight-bold text-gray-800">
                                    {{ DB::table('agents')->where('role_id', 2)->count() }}
                                    </br>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">
                                        Gift Sent
                                    </div>
                                </div>
                                <div class="col-6 h5 mb-0 font-weight-bold text-gray-800">
                                    {{ DB::table('agents')->where('role_id', 2)->count() }}
                                    </br> 
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Gift Delivered
                                    </div>
                                </div>
                            </div>  
                            <!-- <small class="text-muted">
                                Total agents targeted in this campaign.
                            </small> -->
                        </div>

                        <div class="col border text-center p-3">
                            <div class="col-auto mb-2">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $collection->emails_count }}
                            </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Emails in This Sequence
                            </div>
                            <!-- <small class="text-muted">
                                Total agents targeted in this campaign.
                            </small> -->
                        </div>
                        <div class="col border text-center p-3">
                            <div class="col-auto mb-2">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ DB::table('agents')->where('role_id', 2)->count() }}
                            </div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Email Sent
                            </div>
                            <!-- <small class="text-muted">
                                Total agents targeted in this campaign.
                            </small> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <p><strong>List Name:</strong> {{ $contact->name }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive swich_bntts">
                        <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>
                                        <input type="checkbox" id="select-all-users" />
                                    </th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Last Gift Sent/Date of Delivery</th>
                                    <th>Next Gift/Due Date</th>
                                    <th>Modal</th>
                                    <th>View Full Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $urow)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><input type="checkbox" name="selected_users[]" value="{{ $urow->id }}" /></td>
                                    <td>{{ $urow->name }}</td>
                                    <td>{{ $urow->memberid }}</td>
                                    <td>{{ $urow->email }}</td>
                                    <td>{{ $urow->mobile }}</td>
                                    <td>Gift Name/Delivery Date</td>
                                    <td>Gift Name/Due Date</td>
                                    <td>
                                        <label class="switch">
                                            <input @if($urow->status==1) checked @endif  type="checkbox">
                                            <small></small>
                                        </label>
                                    </td>
                                    <td>View Details <a href="#" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a></td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection