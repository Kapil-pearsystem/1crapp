@extends('layouts.app')
@section('title', 'Campaign Report')
@section('content')
@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
@endphp
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h5 mb-0 text-dark">Campaign Report: {{ $campaign->title }}</h5>
        <div class="row float-left">
            <div class="col-md-12">
                <a href="{{ route('collection.campaigns.report', ['id' => $campaign->coll_id, 'camp_id' => $campaign->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left" aria-hidden="true"></i> Back to Campaigns</a>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <p><strong>Customer Name:</strong> {{ $userdata->name }} &ensp; <strong>Customer Email:</strong> {{ $userdata->email }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive swich_bntts">
                        <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Type</th>
                                    <th>Item Name</th>
                                    <th>Template/Image</th>
                                    <th>shiping/Courier Name</th>
                                    <th>Tracking</th>
                                    <th>Current Status of Delivery & Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $startDate = $campaign->start_date;
                                    $after_days = 0;
                                @endphp
                                @foreach($lists as $key => $list)
                                @php 
                                    $after_days += $list->schedule_day;
                                    $deliveryDate = Carbon::parse($campaign->start_date)->addDays($after_days)->format('d M Y');
                                @endphp
                                <tr>
                                    <td>{{ $deliveryDate }}</td>
                                    <td>{{ Carbon::parse($list->schedule_time)->format('H:i:s'); }}</td>
                                    <td>{{ ($list->postal_type == '1')?'Mail':'Gift' }}</td>
                                    @if($list->postal_type == '1')
                                    <td>{{ optional($list->mail)->title }}</td>
                                    <td>
                                        View Now <a href="{{ route('mail.view-mail',['id'=> optional($list->mail)->id]) }}" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
                                    </td>
                                    @else
                                     <td>{{ optional($list->gift)->title }}</td>
                                    <td>
                                        View Now <a href="{{ asset('').'/'.optional($list->gift)->image }}" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
                                    </td>
                                    @endif
                                    <td>
                                    <select class="form-control sm" name="category">
                                        <option value="">Select</option>
                                    </select>
                                    </td>
                                    <td>
                                        {{ rand(10000000, 99999999) }} <a href="#" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
                                    </td>
                                    <td>View Now <a href="#" target="_blank"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a> 
                                        @php
                                            $status = optional($list->log)->status;
                                        @endphp
                                        @if($status == 'sent')
                                            <span class="badge badge-info">Sent</span>
                                        @elseif($status == 'delivered')
                                            <span class="badge badge-success">Delivered</span>
                                        
                                        @else
                                            <span class="badge badge-secondary">Not Sent</span>
                                        @endif
                                    </td>
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