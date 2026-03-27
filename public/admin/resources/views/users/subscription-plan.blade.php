<?php

use Illuminate\Support\Facades\App;

$storeRoute = route('domain.update');
$cancelRoute = route('users.index');
?>
@extends('layouts.app')

@section('title', 'Subscription Plan')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agent Subscription Plan: {{ $agent->first_name . " " . $agent->last_name }}</h1>
        <!-- Page Heading -->
        <a href="javascript:void(0);" onclick="history.back();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <a href="javascript:void(0);" class="btn btn-sm btn-success"   data-toggle="modal" data-target="#price_listst">Upgrade Plan </a>
    </div>

   
    <!--<div class="alert alert-warning">-->
    <!--    <strong>⚠️Warning:</strong> Changing the <strong>subdomain</strong> will affect how this agent's customer accesses the platform.-->
    <!--    Make sure the new subdomain is correct and does not conflict with existing ones.-->
    <!--</div>-->
   
 {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="row">
        <div class="card mt-4 col-12">
            <div class="card-header bg-info text-white">
                <strong>Current Plan Details</strong>
            </div>
            <div class="card-body">
                @php
                    use Carbon\Carbon;
                
                    $validDate = Carbon::parse($agent->valid_upto);
                    $isExpired = $validDate->isPast();
                @endphp


                <p><strong>Plan:</strong> {{ $agent->package_title }}</p>
                <p>
                    <strong>Valid Upto:</strong> 
                    @if($isExpired)
                        <span style="color:red;">Expired</span>
                    @else
                        {{ $validDate->format('d M Y') }}
                    @endif
                </p>
                <hr>
                <h6 class="text-info" style="cursor:pointer;" data-toggle="modal" data-target="#price_listst">Upgrade Plan</h6>
                
                
            </div>
           
        </div>
        <div class="card mt-4 col-12">
            <div class="card-header bg-info text-white">
                <strong>Transactions</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Plan</th>
                                <th>Payment ID</th>
                                <th>Method</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $key => $list)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $list->plan_title }}</td>
                                <td>{{ $list->r_payment_id }}</td>
                                <td>{{ $list->method }}</td>
                                <td>{{ $list->amount }} ({{ $list->currency }})</td>
                                <td>{{ date('d M, Y', strtotime($list->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

@endsection