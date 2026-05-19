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
					 <img src="{{ @$brandingdata->logo }}" width="100px"/>
					 @endif
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds">
					  Brand Logo Fav (50x50)
					 <input type="file" id="" placeholder="File Upload" name="favicon" value="{{ @$brandingdata->favicon }}"   class="form-control form-control-user" />
					 @if(@$brandingdata->favicon)
					  <img src="{{ @$brandingdata->favicon }}" width="100px"/>
					  @endif
					</div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0" id="cl_themess">
					  <span style="color: red;">*</span>Theme Colors
                      <div class="bothss_area">
					   <input type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ old('color') ? old('color') :  @$brandingdata->theme_color }}" />
                       <input type="text" name="theme_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ old('theme_color') ? old('theme_color') : @$brandingdata->theme_color }}" id="hexcolor"></input>
					  </div>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        Copy Right Year
                        <input type="text" minlength="4" maxlength="4" placeholder="Enter Copyright Year" name="copyright_year" value="{{ old('copyright_year') ? old('copyright_year') : @$brandingdata->copyright_year }}" class="form-control form-control-user" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
					</div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0" id="cl_themess">
					  Powered By
                      <div class="bothss_area">
					    <textarea name="message" id="message" class="form-control">{{ @$brandingdata->message }}</textarea>
					  </div>
					</div>
                    <!-- <hr> -->
                    <!-- //Button -->
                    <div class="col-sm-12">
                        <p class="text-info">Footer Button Info</p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Button Text
                        <input type="text" id="" placeholder="Button Text" name="btn_title" value="{{ old('btn_title') ? old('btn_title') : @$brandingdata->btn_title }}" class="form-control form-control-user"/>
					</div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Button Link
                        <input type="url" id="" placeholder="Button Url" name="btn_link" value="{{ old('btn_link') ? old('btn_link') : @$brandingdata->btn_link }}" class="form-control form-control-user"/>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        Button Text Color
                        <input type="color" id="" placeholder="Button Text Color" name="btn_text_color" value="{{ old('btn_text_color') ? old('btn_text_color') : @$brandingdata->btn_text_color }}" class="form-control form-control-user"/>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        Button Background Color
                        <input type="color" id="" placeholder="Button Background Color" name="btn_bg_color" value="{{ old('btn_bg_color') ? old('btn_bg_color') : @$brandingdata->btn_bg_color }}" class="form-control form-control-user"/>
					</div>
                    <div class="col-sm-3 mb-3 mt-1 mb-sm-0 swich_bntts"> 
                        Button Open On new Tab
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input value="1" type="checkbox" @isset($brandingdata) @if($brandingdata->btn_new_tab == 1) checked @endif @endisset name="btn_new_tab"> <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3 mt-1 mb-sm-0 swich_bntts"> 
                        Button Enable
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input value="1" type="checkbox" @isset($brandingdata) @if($brandingdata->btn_enable == 1) checked @endif @endisset name="btn_enable"> <small></small>
                            </label>
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
