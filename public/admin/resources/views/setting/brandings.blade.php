<?php

    $storeRoute = route('setting.updateBranding');
    $cancelRoute = route('setting.brandingsfrm',['id' => auth()->id()]);

?>
@extends('layouts.app')

@section('title', 'Agents List')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Branding</h1>
    </div>
      {{-- Alert Messages --}}
    @include('common.alert')
    <div class="card shadow mb-4">
           <form method="POST" action="{{ $storeRoute }}" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="user_id" value="{{ $data->id }}">
             <input type="hidden" name="role_id" value="{{ $data->role_id }}">
            <div class="card-body">
                <div class="form-group row">


                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Title
					 <input type="text" id="" placeholder="" name="title" value="{{ old('title') ? old('title') : @$brandingdata->title }}" class="form-control form-control-user" required="" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Prepaid By
					 <input type="text" id="" placeholder="" name="prepared_by" value="{{ old('prepared_by') ? old('prepared_by') :  @$brandingdata->prepared_by }}" class="form-control form-control-user" required="" />
					</div>

					 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Mobile No.
					 <input type="text" id="" placeholder="" name="phone" value="{{ old('phone') ? old('phone') :  @$brandingdata->phone }}" class="form-control form-control-user" required="" />
					</div>

					 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Email ID
					 <input type="text" id="" placeholder="" name="email" value="{{ old('email') ? old('email') :  @$brandingdata->email }}" class="form-control form-control-user" required="" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds">
					  Brand Logo
					 <input type="file" id="" placeholder="File Upload" name="logo" value="{{ @$brandingdata->logo }}"   class="form-control form-control-user" />
					  @if(@$brandingdata->logo)
					 <img src="{{ url('img') }}/{{ @$brandingdata->logo }}" width="100px"/>
					 @endif
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds">
					  Brand Logo Fav (50x50)
					 <input type="file" id="" placeholder="File Upload" name="favicon" value="{{ @$brandingdata->favicon }}"   class="form-control form-control-user" />
					 @if(@$brandingdata->favicon)
					  <img src="{{ url('img') }}/{{ @$brandingdata->favicon }}" width="100px"/>
					  @endif
					</div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0" id="cl_themess">
					  <span style="color: red;">*</span>Theme Colors
                      <div class="bothss_area">
					   <input type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ old('color') ? old('color') :  @$brandingdata->theme_color }}" />
                       <input type="text" name="theme_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ old('theme_color') ? old('theme_color') : @$brandingdata->theme_color }}" id="hexcolor"></input>
					  </div>
					</div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
				<a href="{{ $cancelRoute }}" class="btn btn-primary float-right mr-3 mb-3">Cancel</a>
            </div>
        </form>
		 @php
            $setting = \App\Models\AgentSettingModel::where('category', 2)->first();
        @endphp
        @if($setting)
        <div style="background-color: #fff; border-radius: 0px; display: inline-block; width: 100%; padding: 15px 15px 5px; margin-bottom: 20px;">
            <hr>
            <div style="font-size: 12px; display: inline-block; width: 100%; margin-top: 5px;">
                <div style="float: left;">
                    <div style="font-size: 12px;">
                        <strong>To set up your branding, please follow the steps:</strong>
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

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script>
$('#colorpicker').on('input', function() {
	$('#hexcolor').val(this.value);
});
$('#hexcolor').on('input', function() {
  $('#colorpicker').val(this.value);
});
</script>


@endsection
