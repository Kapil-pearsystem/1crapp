<?php

    $storeRoute = route('smtp.updateSmtp');
    $cancelRoute = route('smtp.smtpfrm',['id' => auth()->id()]);

?>@extends('layouts.app')

@section('title', 'Agents List')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SMTP</h1>
    </div>
       {{-- Alert Messages --}}
    @include('common.alert')
    <div class="card shadow mb-4">
        <form method="POST" action="{{ $storeRoute }}">
             @csrf
             <input type="hidden" name="user_id" value="{{ $data->id }}">
             <input type="hidden" name="role_id" value="{{ $data->role_id }}">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Mailer
						<input type="text" id="" placeholder="smtp" name="mailer" value="smtp" class="form-control form-control-user" required="" readonly/>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Host
						<input type="text" id="" placeholder="smtp.gmail.com" name="host" value="{{ old('host') ? old('host') :  @$smtpdata->host }}" class="form-control form-control-user" required="" />
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>User Name
					 <input type="text" id="" placeholder="example@gmail.com" name="username" value="{{ old('username') ? old('username') :  @$smtpdata->username }}" class="form-control form-control-user" required="" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Password
					 <input type="text" id="" placeholder="" name="password" value="{{ old('password') ? old('password') :  @$smtpdata->password }}" class="form-control form-control-user" required="" />
					</div>

					 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Port Number
					 <input type="number" id="" placeholder="465/587.." name="port" value="{{ old('port') ? old('port') :  @$smtpdata->port }}" class="form-control form-control-user" required="" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Encryption Type
					 <input type="text" id="" placeholder="SSL/TSL" name="enc_type" value="{{ old('enc_type') ? old('enc_type') :  @$smtpdata->enc_type }}" class="form-control form-control-user" required="" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>From Address
					 <input type="text" id="" placeholder="noreply@1crapp.com" name="from_address" value="{{ old('from_address') ? old('from_address') :  @$smtpdata->from_address }}" class="form-control form-control-user" required="" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>From Name
					 <input type="text" id="" placeholder="example.1crapp.com" name="from_name" value="{{ old('from_name') ? old('from_name') :  @$smtpdata->from_name }}" class="form-control form-control-user" required="" />
					</div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
				<a href="{{ $cancelRoute }}" class="btn btn-primary float-right mr-3 mb-3">Cancel</a>
            </div>
        </form>
         @php
            $setting = \App\Models\AgentSettingModel::where('category', 3)->first();
        @endphp
        @if($setting)
        <div style="background-color: #fff; border-radius: 0px; display: inline-block; width: 100%; padding: 15px 15px 5px; margin-bottom: 20px;">
            <hr>
            <div style="font-size: 12px; display: inline-block; width: 100%; margin-top: 5px;">
                <div style="float: left;">
                    <div style="font-size: 12px;">
                        <strong>To set up your custom SMTP, please follow the steps below:</strong>
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
