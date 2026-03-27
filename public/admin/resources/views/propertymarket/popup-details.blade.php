@extends('layouts.app')

@section('title', isset($details)?'Edit':'Add'.' Property Popup Details')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details)?'Edit':'Add' }} Property Popup Details</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <a href="{{ route('propertymarket.propertymarketlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Form for Creating OPC Resource -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('propertymarket.popup-store')}}" enctype="multipart/form-data" onsubmit="return validate()"
            name="f1">
            @csrf
            <input type="hidden" name="property_id" value="{{ isset($property_id)?$property_id:'' }}">
            <div class="card-body" style="background: #bedafd;">

                <div class="form-group row" id="brd_box">
                    <div class="row p-4">
                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> Title<span class="text-danger">*</span>
                            <input type="text" id="" placeholder="Enter Popup Title" name="title"
                                value="{{ old('title') ?? ($details->title ?? '') }}"
                                class="form-control form-control-user" required/>
                        </div>

                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> CTA Title<span class="text-danger">*</span>
                            <input type="text" id="" placeholder="Enter CTA Title" name="cta_title"
                                value="{{ old('cta_title')??($details->cta_title ?? '')}}"
                                class="form-control form-control-user" required/>
                        </div>


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


                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="vid_link" >
                        Enter PopUp Youtube Video Embeded Link<span class="text-danger">*</span>
                        <input type="url" id="vid_link" placeholder="Pest URL or Link" name="vid_link" value="{{ old('vid_link')??($details->vid_link ?? '')}}"  {{ isset($details)?'' : ''}} class="form-control form-control-user" required/>
                        <span id="mediaLinkError" class="err text-danger"></span> @if(session('vid_link')) <span class="text-danger"> {{ session('vid_link') }} </span> @endif
                    </div>
                    <!-- <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="form_source" >
                        Enter PopUp Form Source<span class="text-danger">*</span>
                        <input type="url" id="form_source" placeholder="Pest URL or Link" name="form_source" value="{{ old('form_source')??($details->form_source ?? '')}}"  {{ isset($details)?'' : ''}} class="form-control form-control-user" required/>
                        <span id="mediaLinkError" class="err text-danger"></span> @if(session('form_source')) <span class="text-danger"> {{ session('form_source') }} </span> @endif
                    </div> -->

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

<script>
    function PageCtcUrl(status) {
        if (status == 1) {
            $('#other_popup_destination_id').val('');
            $('#page_cta_url_id').val('');
            $('#other_page_cta_url').attr('style', 'display: none !important');
            $('.cta').attr('style', 'display: none !important');
            $('.dstn').attr('style', 'display: block !important');
            $('.popup_section').attr('style', 'display: block !important');
        } else {
            $('#other_page_cta_url_id').val('');
            $('#destination_id').val('');
            $('#other_page_destination').attr('style', 'display: none !important');
            $('#other_page_cta_url').attr('style', 'display: none !important');
            $('.cta').attr('style', 'display: block !important');
            $('.dstn').attr('style', 'display: none !important');
            $('.popup_section').attr('style', 'display: none !important');
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
        } else if (media_type == 3) {
            $('#video_link').attr('style', 'display: block !important');
            $('#media_type_file').attr('style', 'display: none !important');
            $('#media_type_link').attr('style', 'display: none !important');
        } else {
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
    function setFormType(type) {
        alert(type);
        if (type == 'custom') {
            $('.custom_form_type').attr('style', 'display: block !important');
            $('.embeded_form_type').attr('style', 'display: none !important');
        } else {
            $('.custom_form_type').attr('style', 'display: none !important');
            $('.embeded_form_type').attr('style', 'display: block !important');
        }
    }
</script>