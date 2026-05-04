@extends('layouts.app')

@section('title', isset($details)?'Edit':'Add'.' Page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details)?'Edit':'Add' }} Page</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <a href="{{ route('page.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Form for Creating OPC Resource -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('page.store')}}" enctype="multipart/form-data" onsubmit="return validate()"
            name="f1">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details)?$details->id:'' }}">
            <div class="card-body" style="    background: #bedafd;">
                <div class="form-group row" id="brd_box">
                    <div class="col-sm-12 mb-2 mt-1 mb-sm-0"> <span style="color: red;">*</span>Page Name <input
                            type="text" id="" placeholder="Enter Page Name" name="page_name"
                            value="{{ old('page_name') ?? ($details->page_name ?? '') }}" required
                            class="form-control form-control-user" /> </div> @if ($errors->has('page_name')) <span
                        class="text-danger">{{ $errors->first('page_name') }}</span> @endif
                    <!--<div class="col-sm-4 mb-3 mt-1 mb-sm-0">-->
                    <!--    <span style="color: red;">*</span>Tag-->
                    <!--    <select name="tag_id" id="tag_id" class="form-control" required>-->
                    <!--        <option value="">Select Option</option>-->
                    <!--        @foreach($tags as $tag)-->
                    <!--        <option value="{{ $tag->id }}"-->
                    <!--            {{ isset($details) && $details->tag_id == $tag->id ? 'selected' : '' }}>{{ $tag->name }}-->
                    <!--        </option>-->
                    <!--        @endforeach-->
                    <!--    </select>-->
                    <!--</div>-->
                    <!--<div class="col-sm-4 mb-3 mt-1 mb-sm-0">-->
                    <!--    <span style="color: red;">*</span>List-->
                    <!--    <select name="list_id" id="list_id" class="form-control" required>-->
                    <!--        <option value="">Select Option</option>-->
                    <!--        @foreach($lists as $list)-->
                    <!--        <option value="{{ $list->id }}"-->
                    <!--            {{ isset($details) && $details->list_id == $list->id ? 'selected' : '' }}>-->
                    <!--            {{ $list->name }}</option>-->
                    <!--        @endforeach-->
                    <!--    </select>-->
                    <!--</div>-->
                </div>
                <div class="form-group row" id="brd_box">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-sm-9 mb-2 mt-1 mb-sm-0"> Pre Headline
                                <input type="text" id="" placeholder="Enter Pre Headline" name="pre_heading"
                                    value="{{ old('pre_heading') ?? ($details->pre_heading ?? '') }}"
                                    class="form-control form-control-user" /> </div>
                            <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">Visible <div class="block_araea mt-1"><label
                                        class="switch"><input value="1" type="checkbox" @isset($details)
                                            @if($details->pre_heading_status == 1) checked @endif @endisset
                                        name="pre_heading_status"> <small></small></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-sm-9 mb-2 mt-1 mb-sm-0"> Headline <input
                                    type="text" id="" placeholder="Enter Title" name="title"
                                    value="{{ old('title')??($details->title ?? '')}}"
                                    class="form-control form-control-user" /> </div>
                            <div class="col-sm-3 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible <div class="block_araea mt-1"><label
                                        class="switch"><input value="1" type="checkbox" @isset($details)
                                            @if($details->title_status == 1) checked @endif @endisset
                                        name="title_status"> <small></small></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-sm-9 mb-2 mt-1 mb-sm-0"> Post Headline
                                <input type="text" id="" placeholder="Enter Subtitle" name="subtitle"
                                    value="{{ old('subtitle')??($details->subtitle ?? '')}}"
                                    class="form-control form-control-user" /> </div>
                            <div class="col-sm-3 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible <div class="block_araea mt-1"><label
                                        class="switch"><input value="1" type="checkbox" @isset($details)
                                            @if($details->subtitle_status == 1) checked @endif @endisset
                                        name="subtitle_status"> <small></small></label></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group row" id="brd_box">
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0 ">
                        Bullet 1
                        <input type="text" id="" placeholder="Enter Bullet 1" name="bullet1"
                            value="{{ old('bullet1')??($details->bullet1 ?? '')}}"
                            class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0 ">
                        Bullet 2
                        <input type="text" id="" placeholder="Enter Bullet 2" name="bullet2"
                            value="{{ old('bullet2')??($details->bullet2 ?? '')}}"
                            class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0 "> Bullet 3 <input
                            type="text" id="" placeholder="Enter Bullet 3" name="bullet3"
                            value="{{ old('bullet3')??($details->bullet3 ?? '')}}"
                            class="form-control form-control-user" /> </div>
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0 "> Bullet 4 <input
                            type="text" id="" placeholder="Enter Bullet 4" name="bullet4"
                            value="{{ old('bullet4')??($details->bullet4 ?? '')}}"
                            class="form-control form-control-user" /> </div>
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0 "> Bullet 5 <input
                            type="text" id="" placeholder="Enter Bullet 5" name="bullet5"
                            value="{{ old('bullet5')??($details->bullet5 ?? '')}}"
                            class="form-control form-control-user" /> </div>
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0 "> Bullet 6 <input
                            type="text" id="" placeholder="Enter Bullet 6" name="bullet6"
                            value="{{ old('bullet6')??($details->bullet6 ?? '')}}"
                            class="form-control form-control-user" /> </div>
                    <div class="col-sm-12 mb-3 mt-1 mb-sm-0 swich_bntts"> Bullet
                        Status <div class="block_araea mt-1"><label class="switch"><input value="1" type="checkbox"
                                    @isset($details) @if($details->bullet_status == 1) checked @endif @endisset
                                name="bullet_status"> <small></small></label></div>
                    </div>
                </div>

                <div class="form-group row" id="brd_box">
                    <div class="col-sm-5 mt-1 mb-3 mb-sm-0"> Media Type <select
                            name="media_type" id="media_type" class="form-control form-control-user"
                            onchange="setMedia(this.value)">
                            <option selected="selected" disabled="disabled">Select Media Type</option>
                            <option value="1"
                                {{ (old('media_type') ?? ($details->media_type ?? '')) == 1 ? 'selected' : '' }}>Image
                            </option>
                            <option value="2"
                                {{ (old('media_type') ?? ($details->media_type ?? '')) == 2 ? 'selected' : '' }}>Embed
                                Link</option>
                            <option value="3"
                                {{ (old('media_type') ?? ($details->media_type ?? '')) == 3 ? 'selected' : '' }}>Video
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="media_type_file"
                        <?php if (
                            (old("media_type") ??
                                ($details->media_type ?? "")) !=
                            1
                        ) { ?> style="display:none;"
                        <?php } ?>> Media File <input type="file" id=""
                            placeholder="Enter Media File" name="media_file" value="{{ old('media_file')}}"
                            {{ isset($details)?'' : ''}} class="form-control form-control-user" /> <input type="hidden"
                            name="old_media_file" value="{{ isset($details)?$details->media_file : ''}}" /> </div>
                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="media_type_link" <?php if (
                        (old("media_type") ?? ($details->media_type ?? "")) ==
                        2
                    ) { ?> style="display:block;" <?php } else { ?>style="display:none;" <?php } ?>>
                        Pest Embeded Code
                        <input type="url" id="media_link" placeholder="Pest Embeded Code.. " name="media_link" value="{{ old('media_link')??($details->media_link ?? '')}}"  {{ isset($details)?'' : ''}} class="form-control form-control-user" />
                        <span id="mediaLinkError" class="err text-danger"></span> @if(session('media_link_error')) <span class="text-danger"> {{ session('media_link_error') }} </span> @endif
                    </div>
                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="video_link" <?php if (
                        (old("media_type") ?? ($details->media_type ?? "")) ==
                        3
                    ) { ?> style="display:block;" <?php } else { ?>style="display:none;" <?php } ?>>
                        Enter URL or Link
                        <input type="url" id="media_link" placeholder="Pest URL or Link" name="media_link" value="{{ old('media_link')??($details->media_link ?? '')}}"  {{ isset($details)?'' : ''}} class="form-control form-control-user" />
                        <span id="mediaLinkError" class="err text-danger"></span> @if(session('media_link_error')) <span class="text-danger"> {{ session('media_link_error') }} </span> @endif
                    </div>
                        <div class="col-sm-1 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible
                        <div class="block_araea mt-1">
                            <label class="switch"> <input value="1" type="checkbox" @isset($details) @if($details->media_file_status == 1) checked @endif @endisset name="media_file_status"> <small></small></label>
                        </div>
                    </div>
                    <div class="col-sm-11 mb-3 mt-3 mb-sm-0"> Countdown Time <label
                            for="datetime">Select Date and Time:</label> <input type="datetime-local" id="datetime"
                            name="countdown" value="{{ old('countdown')??($details->countdown ?? '')}}"
                            class="form-control form-control-user">
                        <!-- <input type="date" id="" name="countdown" value="{{ old('countdown')??($details->countdown ?? '')}}"  class="form-control form-control-user" /> -->
                    </div>
                    <div class="col-sm-1 mb-3 mt-3 mb-sm-0 swich_bntts float-right"> Enable <div class="block_araea mt-1"><label
                                class="switch"><input value="1" type="checkbox" @isset($details)
                                    @if($details->countdown_status == 1) checked @endif @endisset
                                name="countdown_status"> <small></small></label></div>
                    </div>
                </div>

                <div class="form-group row" id="brd_box">
                    <div class="col-sm-5 mb-2 mt-1 mb-sm-0"> Pre Cta <input
                            type="text" id="" placeholder="Enter Pre Cta" name="pre_cta"
                            value="{{ old('pre_cta')??($details->pre_cta ?? '')}}"
                            class="form-control form-control-user" /> </div>
                    <div class="col-sm-1 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible <div
                            class="block_araea mt-1"><label class="switch"><input value="1" type="checkbox"
                                    @isset($details) @if($details->pre_cta_status == 1) checked @endif @endisset
                                name="pre_cta_status"> <small></small></label></div>
                    </div>
                    <div class="col-sm-5 mb-2 mt-1 mb-sm-0"> PS Text <input
                            type="text" id="" placeholder="Enter PS Text" name="ps_text"
                            value="{{ old('ps_text')??($details->ps_text ?? '')}}"
                            class="form-control form-control-user" /> </div>
                    <div class="col-sm-1 mb-1 mt-1 mb-sm-0 swich_bntts">
                        Visible <div
                            class="block_araea mt-1"><label class="switch"><input value="1" type="checkbox"
                                    @isset($details) @if($details->ps_text_status == 1) checked @endif @endisset
                                name="ps_text_status"> <small></small></label></div>
                    </div>
                </div>

                <div class="form-group row" id="brd_box">
                    <div class="col-sm-2 mb-2 mt-1 mb-sm-0 swich_bntts ">
                        Popup Enable
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" type="checkbox"
                                    onclick="PageCtcUrl(this.checked ? this.value : 0)" @isset($details)
                                    @if($details->popup_status == 1) checked @endif @endisset name="popup_status">
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-1 mt-3 mb-sm-0 swich_bntts"> Form Type
                        <select name="form_type" id="type_id" class="form-control form-control-user"
                            onchange="setFormType(this.value)">
                            <option selected="selected" value="">Select Type</option>
                            <option value="custom" {{ (old('form_type') ?? ($details->form_type ?? '')) == 'custom' ? 'selected' : '' }}>  Custom</option>
                            <option value="embeded" {{ (old('form_type') ?? ($details->form_type ?? '')) == 'embeded' ? 'selected' : '' }}>  Embeded</option>
                            <option value="external" {{ (old('form_type') ?? ($details->form_type ?? '')) == 'external' ? 'selected' : '' }}>  External</option>
                        </select>
                    </div>
                    
                    <div class="col-sm-6 mb-5 mt-3 mb-sm-0 popup_section custom_form_type" style="display:none;"> Embed Form Content
                        <select name="form_id" id="destination_id" class="form-control form-control-user">
                            <option selected="selected" value="">Select Custom Form</option>
                            @foreach($forms as $form)
                            <option value="{{ $form->id }}"
                                {{ isset($details) && $details->form_id == $form->id ? 'selected' : '' }}>{{ $form->form_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    <div class="col-sm-4 mb-5 mt-3 mb-sm-0 external_form_type popup_section" id="other_page_cta_url"
                        <?php if (isset($details)) {
                            if (
                                $details->form_type == 'external'
                            ) { ?>
                        style="display:block;" <?php } else { ?> style="display:none;" <?php }
                        } else {
                                ?>
                        style="display:none;" <?php
                        } ?>>
                        Enter External Url
                        <input type="url" id="other_page_cta_url_id" placeholder="Enter Other CTA Url"
                            name="external_url"
                            value="{{ old('external_url')??($details->page_cta_url ?? '')}}"
                            class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-2 mb-1 mt-3 mb-sm-0 swich_bntts external_form_type popup_section">
                        <div id="cta_url" class="cta"
                            <?php if (isset($details)) {
                                if (
                                    $details->popup_destination != ""
                                ) { ?> style="display:none;"
                            <?php } else { ?> style="display:block;" <?php }
                            } ?>>
                            Open New Tab
                            <div class="block_araea mt-1"><label class="switch"><input value="1" type="checkbox"
                                        @isset($details) @if($details->open_new_tab == 1) checked @endif @endisset
                                    name="open_new_tab"> <small></small></label></div>
                        </div>

                    </div>
                    <!-- ------------------------------------- -->
                    <div class="col-12 popup_section embeded_form_type"  style="display:none;">
                        <div class="row">
                            <!-- <div class="col-sm-2 mb-1 mt-3 mb-sm-0 swich_bntts"> Embed form
                                <div class="block_araea mt-1">
                                    <label class="switch"><input value="1" type="checkbox"
                                            @isset($details) @if($details->embed_form_status == 1) checked @endif @endisset
                                        name="embed_form_status"> <small></small>
                                    </label>
                                </div>
                            </div> -->
                            <div class="col-sm-12 mb-5 mt-3 mb-sm-0"> Embed Form Content
                                <textarea id="" placeholder="Enter Embed Form Content" name="embed_form_code"
                                    class="form-control form-control-user"
                                    style="height: 250px !important;">{{ old('embed_form_code')??($details->embed_form_code ?? '')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="form-group row" id="brd_box">
                    <div class="col-sm-2 mb-1 mt-1 mb-sm-0 swich_bntts">
                        Additional CTA Enable
                        <div class="block_araea mt-1"><label class="switch"><input value="1" type="checkbox"
                                    @isset($details) @if($details->addination_cta_status == 1) checked @endif @endisset
                                name="addination_cta_status"> <small></small></label></div>
                    </div>
                    <div class="col-sm-4 mb-1 mt-3 mb-sm-0 swich_bntts"> Type
                        <select name="addination_cta_type" id="addination_type_id" class="form-control form-control-user"
                            onchange="setAddtionalCTAType(this.value)">
                            <option selected="selected" value="">Select Type</option>
                            <option value="assets" {{ (old('addination_cta_type') ?? ($details->addination_cta_type ?? '')) == 'assets' ? 'selected' : '' }}> My Digital Assets</option>
                            <option value="custom_url" {{ (old('addination_cta_type') ?? ($details->addination_cta_type ?? '')) == 'custom_url' ? 'selected' : '' }}>  Custom URL</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-5 mt-3 mb-sm-0 custom-url-field cta_section">
                        Additional CTA URL
                        <input type="text" id="" placeholder="Enter Additional CTA URL" name="addination_url"
                            value="{{ old('addination_url')??($details->addination_url ?? '')}}"
                            class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-5 mt-3 mb-sm-0 cta_section asset-field" style="display:none;"> Embed Form Content
                        <select name="asset_id" id="asset_id" class="form-control form-control-user">
                            <option selected="selected" value="">Select Assets</option>
                            @foreach($assets as $asset)
                            <option value="{{ $asset->id }}"
                                {{ isset($details) && $details->asset_id == $asset->id ? 'selected' : '' }}>{{ $asset->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 mb-1 mt-1 mb-sm-0 swich_bntts addination_cta_new_tab" style="display:none;">
                        Open New Tab
                        <div class="block_araea mt-1"><label class="switch"><input value="1" type="checkbox"
                                    @isset($details) @if($details->addination_cta_new_tab == 1) checked @endif @endisset
                                name="addination_cta_new_tab"> <small></small></label></div>
                    </div>
                    <div class="col-sm-12 mb-6 mt-2 mb-sm-0">
                        Additional CTA Title
                        <input type="text" id="" placeholder="Enter Additional CTA Title" name="addination_cta_title"
                            class="form-control form-control-user" value="{{ old('addination_cta_title')??($details->addination_cta_title ?? '')}}" />
                    </div>
                    <div class="col-sm-12 mb-6 mt-2 mb-sm-0">
                        Additional CTA Content
                        <textarea id="" placeholder="Enter Additional CTA Content" name="addination_cta"
                            class="form-control form-control-user">{{ old('addination_cta')??($details->addination_cta ?? '')}}</textarea>
                    </div>
                </div>

                <div class="form-group row popup_section_content" id="brd_box">
                    <div class="col-sm-12 mb-3 mt-1 mb-sm-0" >
                        <div class="row">
                            <div class="col-sm-10 mb-2 mt-1 mb-sm-0"> Popup Image
                                <input type="file" id="" placeholder="Enter Popup Image" name="popup_image"
                                    value="{{ old('popup_image')}}" {{ isset($details)?'' : ''}}
                                    class="form-control form-control-user"/>
                                <input type="hidden" name="old_popup_image" value="{{ isset($details)?$details->popup_image : ''}}" />
                                @if(isset($details) && $details->popup_image)
                                    <br><img src="{{ asset($details->popup_image) }}" alt="Popup Image" style="max-width: 100px; max-height: 100px;" />
                                @endif
                            </div>
                            <div class="col-sm-2 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible <div class="block_araea mt-1"><label
                                        class="switch"><input value="1" type="checkbox" @isset($details)
                                            @if($details->popup_image_status == 1) checked @endif @endisset
                                        name="popup_image_status"> <small></small></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3 mt-1 mb-sm-0">
                        <div class="row">
                            <div class="col-sm-10 mb-6 mt-6 mb-sm-0"> Popup Title
                                <input type="text" id="" placeholder="Enter Popup Title" name="popup_title"
                                    class="form-control form-control-user" value="{{ old('popup_title')??($details->popup_title ?? '')}}" />
                            </div>
                            <div class="col-sm-2 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible <div class="block_araea mt-1"><label
                                        class="switch"><input value="1" type="checkbox" @isset($details)
                                            @if($details->popup_title_status == 1) checked @endif @endisset
                                        name="popup_title_status"> <small></small></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3 mt-1 mb-sm-0">
                        <div class="row">
                            <div class="col-sm-10 mb-6 mt-6 mb-sm-0"> Popup Content
                                <textarea id="" placeholder="Enter Popup Content" name="popup_content"
                                    class="form-control form-control-user">{{ old('popup_content')??($details->popup_content ?? '')}}</textarea>
                            </div>
                            <div class="col-sm-2 mb-1 mt-1 mb-sm-0 swich_bntts"> Visible <div class="block_araea mt-1"><label
                                        class="switch"><input value="1" type="checkbox" @isset($details)
                                            @if($details->popup_content_status == 1) checked @endif @endisset
                                        name="popup_content_status"> <small></small></label></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row" id="brd_box">

                    <div class="col-sm-6 mb-3 mt-1 mb-sm-0">
                        Status
                        <select name="status" class="form-control form-control-user">
                            <option selected="selected" disabled="disabled">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($details->status ?? '')) == 0 ? 'selected' : '' }}>
                                Inactive</option>
                            <option value="1" {{ (old('status') ?? ($details->status ?? '')) == 1 ? 'selected' : '' }}>
                                Active</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer"
                    style="display: inline-block; width: 100%; background: transparent; border: none; text-align: center; padding-bottom:0;">
                    <a class="btn btn-primary mb-3 mr-3" href="javascript:void(0);">Cancel</a>
                    <button type="submit"
                        class="btn btn-success btn-user mb-3">{{ isset($details)?'Update':'Save' }}</button>

                </div>
        </form>
    </div>

</div>

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function(){
    var popup_status = "{{ isset($details) ? $details->popup_status : 0 }}";
    PageCtcUrl(popup_status);
});
function PageCtcUrl(status) {
    var formType = $('#type_id');

    if (status == 1) {
        
        $('.popup_section_content').attr('style', 'display: block !important');
        $('.external_form_type').attr('style', 'display: none !important');
        // Hide external option
        formType.find('option[value="external"]').hide();
        // If currently selected is external, reset it
        if (formType.val() == 'external') {
            formType.val('');
        }

    } else {
        // Show external option
        formType.find('option[value="external"]').show();
        $('.popup_section_content').attr('style', 'display: none !important');
    }
}

function setOtherPageCta(page_cta) {

    if (page_cta == 'other') {
        $('#other_page_cta_url_id').val('');
        $('#other_page_cta_url').attr('style', 'display: block !important');
    } else {
        $('#other_page_cta_url_id').val('');
        $('#other_page_cta_url').attr('style', 'display: none !important');
    }
}

function setOtherDestination(page_dest) {

    if (page_dest == 'other') {
        $('#other_popup_destination_id').val('');
        $('#other_page_destination').attr('style', 'display: block !important');
    } else {
        $('#other_popup_destination_id').val('');
        $('#other_page_destination').attr('style', 'display: none !important');
    }
}
</script>
<script>
function setMedia(media_type) {
    if (media_type == 2) {
        $('#video_link').attr('style', 'display: none !important');
        $('#media_type_file').attr('style', 'display: none !important');
        $('#media_type_link').attr('style', 'display: block !important');
    }else if(media_type == 3){
        $('#video_link').attr('style', 'display: block !important');
        $('#media_type_file').attr('style', 'display: none !important');
        $('#media_type_link').attr('style', 'display: none !important');
    }else {
        $('#video_link').attr('style', 'display: none !important');
        $('#media_type_file').attr('style', 'display: block !important');
        $('#media_type_link').attr('style', 'display: none !important');
    }
}
</script>
<script>
flatpickr("#datetime", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
});
</script>
<script>
    $(document).ready(function(){
        var formType = $('#type_id').val();
        setFormType(formType);
    });
    function setFormType(type){
        $('.popup_section').attr('style', 'display: none !important');
        if(type == 'custom'){
            $('.custom_form_type').attr('style', 'display: block !important');
        }else if(type == 'external'){
            $('.external_form_type').attr('style', 'display: block !important');
        }else if(type == 'embeded') {
            $('.embeded_form_type').attr('style', 'display: block !important');
        }
    }
</script>

<script>
    $(document).ready(function(){
        var AddformType = $('#addination_type_id').val();
        setAddtionalCTAType(AddformType);
    });
    function setAddtionalCTAType(type){
        $('.cta_section').attr('style', 'display: none !important');
        if(type == 'assets'){
            $('.asset-field').attr('style', 'display: block !important');
        $('.addination_cta_new_tab').attr('style', 'display: block !important');
        }else if(type == 'custom_url'){
            $('.custom-url-field').attr('style', 'display: block !important');
        $('.addination_cta_new_tab').attr('style', 'display: block !important');
        }else {
            $('.asset-field').attr('style', 'display: none !important');
            $('.custom-url-field').attr('style', 'display: none !important');
        $('.addination_cta_new_tab').attr('style', 'display: none !important');
        }
    }
</script>