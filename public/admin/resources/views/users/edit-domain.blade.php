<?php

use Illuminate\Support\Facades\App;

$storeRoute = route('domain.update');
$cancelRoute = route('users.index');
?>
@extends('layouts.app')

@section('title', 'Edit Agent Domain')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Agent Domain: {{ $agent->first_name . " " . $agent->last_name }}</h1>
        <a href="javascript:void(0);" onclick="history.back();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

   
    <div class="alert alert-warning">
        <strong>⚠️Warning:</strong> Changing the <strong>subdomain</strong> will affect how this agent's customer accesses the platform.
        Make sure the new subdomain is correct and does not conflict with existing ones.
    </div>
   
 {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <form method="POST" action="{{$storeRoute}}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $agent->id }}">
             <input type="hidden" name="role_id" value="{{ $agent->role_id }}">
            <div class="card-body">
                <div class="form-group row">

                    {{-- Subdomain --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label for="subdomain"><span style="color:red;">*</span>Subdomain</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('subdomain') is-invalid @enderror"
                            id="subdomain"
                            placeholder="Subdomain"
                            name="subdomain"
                            value="{{ old('subdomain') ?  old('subdomain') : $agent->subdomain}}" required>
                        <small class="form-text text-muted">Will be used as: <strong>subdomain.1crapp.com</strong></small>

                        @error('subdomain')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Custom Domain --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label for="custom_domain">Custom Domain</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('custom_domain') is-invalid @enderror"
                            id="custom_domain"
                            placeholder="Custom Domain"
                            name="custom_domain"
                            value="{{ old('custom_domain') ? old('custom_domain') : $agent->custom_domain }}">
                        <small class="form-text text-muted">Example: <strong>agentcustomdomain.com</strong></small>

                        @error('custom_domain')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="javascript:void(0);" onclick="history.back();">Cancel</a>
            </div>
        </form>
    </div>
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <strong>🛠 Steps to Setup Custom Domain (DNS Configuration)</strong>
        </div>
        <div class="card-body">
            <ol class="mb-0">
                <li>
                    Log in to your domain registrar (e.g., GoDaddy, Namecheap, Cloudflare).
                </li>
                <li>
                    Go to the DNS Management section.
                </li>
                <li>
                    Create a <strong>CNAME</strong>:
                    <ul>
                        <li>
                            <strong>CNAME:</strong><br>
                            Point your custom domain (e.g., <code>www.customdomain.com</code>) to: <br>
                            <code>1crapp.com</code> <br>
                            or subdomain: <code>{{ old('subdomain') ?  old('subdomain') : $agent->subdomain}}.1crapp.com</code>
                        </li>
                    </ul>
                </li>
                <li>
                    Make sure any existing conflicting records (like other A or CNAME for root domain) are removed.
                </li>
                <li>
                    Save the DNS settings and allow propagation (can take up to 30 minutes to 24 hours).
                </li>
                <li>
                    Once DNS is set, enter the domain above and save. The system will detect and use it.
                </li>
            </ol>
        </div>
        @php
            $setting = \App\Models\AgentSettingModel::where('category', 4)->first();
        @endphp
        @if($setting)
        <div style="background-color: #fff; border-radius: 0px; display: inline-block; width: 100%; padding: 15px 15px 5px; margin-bottom: 20px;">
            <hr>
            <div style="font-size: 12px; display: inline-block; width: 100%; margin-top: 5px;">
                <div style="float: left;">
                    <div style="font-size: 12px;">
                        <strong>To set up your domain, please follow the steps:</strong>
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