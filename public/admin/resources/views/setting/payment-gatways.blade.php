<?php
    $storeRoute = route('setting.updatePaymentGateway');
    $cancelRoute = route('setting.paymentgatways',['id' => auth()->id()]);
?>
@extends('layouts.app')

@section('title', 'Agents List')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Payment Gateways</h1>
    </div>
     {{-- Alert Messages --}}
    @include('common.alert')
    <div class="card shadow mb-4">
        <form method="POST" action="{{ $storeRoute }}">
             @csrf
             <input type="hidden" name="user_id" value="{{ $data->id }}">
             <input type="hidden" name="role_id" value="{{ $data->role_id }}">
            <div class="card-body">
                 <h3>Razorpay</h3>
                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					   <span style="color: red;">*</span>Status
                       <select name="status" required class="form-control form-control-user ">
    						<option value="">Select Status</option>
    						<option @if(@$paymentdata->status==0) selected @endif value="0">Inactive</option>
    						<option @if(@$paymentdata->status==1) selected @endif value="1">Active</option>
					   </select>
					</div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Public Key
					 <input type="text" id="" placeholder="" name="api_key" value="{{ old('api_key') ? old('api_key') : @$paymentdata->api_key }}" class="form-control form-control-user" required="" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Private Key
					 <input type="text" id="" placeholder="" name="api_secret" value="{{ old('api_secret') ? old('api_secret') : @$paymentdata->api_secret }}" class="form-control form-control-user" required="" />
					</div>

					 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Callback Url
					 <input type="text" id="" placeholder="" value="{{ old('callback_url') ? old('callback_url') : @$paymentdata->callback_url }}" name="callback_url" class="form-control form-control-user" required="" />
					</div>


                </div>
            </div>

             <div class="card-body">
                 <h3>Instamojo</h3>
                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					   <span style="color: red;">*</span>Status
                       <select name="instamojo_status" required class="form-control form-control-user ">
    						<option value="">Select Status</option>
    						<option @if(@$paymentdata2->status==0) selected @endif value="0">Inactive</option>
    						<option @if(@$paymentdata2->status==1) selected @endif value="1">Active</option>
					   </select>
					</div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Public Key
					 <input type="text" id="" placeholder="" name="instamojo_api_key" value="{{ old('instamojo_api_key') ? old('instamojo_api_key') : @$paymentdata2->api_key }}" class="form-control form-control-user" required="" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Private Key
					 <input type="text" id="" placeholder="" name="instamojo_api_secret" value="{{ old('instamojo_api_secret') ? old('instamojo_api_secret') : @$paymentdata2->api_secret }}" class="form-control form-control-user" required="" />
					</div>

					 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Callback Url
					 <input type="text" id="" placeholder="" value="{{ old('instamojo_callback_url') ? old('instamojo_callback_url') : @$paymentdata2->callback_url }}" name="instamojo_callback_url" class="form-control form-control-user" required="" />
					</div>


                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
				<a href="{{ $cancelRoute }}" class="btn btn-primary float-right mr-3 mb-3">Cancel</a>
            </div>
        </form>
		 @php
            $setting = \App\Models\AgentSettingModel::where('category', 1)->first();
        @endphp
        @if($setting)
        <div style="background-color: #fff; border-radius: 0px; display: inline-block; width: 100%; padding: 15px 15px 5px; margin-bottom: 20px;">
            <hr>
            <div style="font-size: 12px; display: inline-block; width: 100%; margin-top: 5px;">
                <div style="float: left;">
                    <div style="font-size: 12px;">
                        <strong>To set up your Payment Gateway, please follow the steps:</strong>
                        <span style="float: right;">
                            <a href="{{ $setting->tutorial_link??'javascript:void(0);' }}" target="{{ $setting->tutorial_link_new_tab ? '_blank' : '_self' }}">
                                View tutorial <i class="fas fa-external-link-alt me-1"></i>
                            </a>
                        </span>
                    </div>
                </div>
                <div style="float: left;">
                    <a href="{{ $setting->video_link??'javascript:void(0);' }}" target="{{ $setting->video_link_new_tab ? '_blank' : '_self' }}">
                        <img src="{{ asset('img/video-tutorial-new.png') }}" style="width: 50px; position: relative; top: -4px; left: 10px;">
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>





@endsection

@section('scripts')

@endsection
