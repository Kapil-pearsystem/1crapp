@extends('layouts.app')

@section('title', isset($details)?'Edit':'Add'.' Core Page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details)?'Edit':'Add' }} Core Page</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <a href="{{ route('core-page.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Form for Creating OPC Resource -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('page.store')}}" enctype="multipart/form-data" onsubmit="return validate()"
            name="f1">
            @csrf
            <div class="modal-body">
            <input type="hidden" name="id" value="{{ isset($details)?$details->id:'' }}">
                <div class="form-group row">
                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> <span style="color: red;">*</span>Page Name <input
                            type="text" id="" placeholder="Enter Page Name" name="page_name"
                            value="{{ old('page_name') ?? ($details->page_name ?? '') }}" required
                            class="form-control form-control-user" /> </div> @if ($errors->has('page_name')) <span
                        class="text-danger">{{ $errors->first('page_name') }}</span> @endif
                    
                    
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Layout <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout" id="inlineRadio1" value="1" {{ (old('layout', $details->layout ?? 0) == 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Default</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout" id="inlineRadio2" value="2" {{ (old('layout', $details->layout ?? 0) == 2) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Custom</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout" id="inlineRadio3" value="0" {{ (old('layout', $details->layout ?? 0) == 0) ? 'checked' : '' }} {{ isset($details)?'':'checked' }}>
                            <label class="form-check-label" for="inlineRadio3">None</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row" id="sectionWrapper">
                    <div class="d-flex">
                        <h6>Sections</h6>
                        <button type="button" id="addMoreSection" class="btn btn-sm btn-primary" style="position:absolute; right:10px;">+ Section </button>
                    </div>
                        <div class="col-12 section-item border p-3 mb-3 rounded position-relative">

                            <button type="button"
                                class="btn btn-danger btn-sm removeSection"
                                style="position:absolute; right:10px; top:10px;">
                                Remove
                            </button>

                            <div class="row">

                                <!-- Section Type -->
                                <div class="col-sm-5 mb-3">
                                    <label>Section Type</label>

                                    <select name="section_type[]" class="form-control sectionType">
                                        <option value="">Select Section Type</option>

                                        <option value="hero">Hero Section</option>

                                        <option value="custom">Custom Section</option>
                                    </select>
                                </div>

                                <!-- Hero Sections -->
                                <div class="col-sm-5 mb-3 heroSection d-none">
                                    <label>Hero Sections</label>

                                    <select name="hero_section[]" class="form-control">
                                        <option value="">Select Hero Section</option>

                                        <option value="hero1">Hero 1</option>

                                        <option value="hero2">Hero 2</option>
                                    </select>
                                </div>

                                <!-- Custom Sections -->
                                <div class="col-sm-5 mb-3 customSection d-none">
                                    <label>Custom Sections</label>

                                    <select name="custom_section[]" class="form-control">
                                        <option value="">Select Custom Section</option>

                                        <option value="custom1">Custom 1</option>

                                        <option value="custom2">Custom 2</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="form-group row">
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
<script>
$(document).ready(function () {

    // Add More Section
    $('#addMoreSection').on('click', function () {

        let html = `
        <div class="col-12 section-item border p-3 mb-3 rounded position-relative">

            <button type="button"
                class="btn btn-danger btn-sm removeSection"
                style="position:absolute; right:10px; top:10px;">
                Remove
            </button>

            <div class="row">

                <!-- Section Type -->
                <div class="col-sm-5 mb-3">
                    <label>Section Type</label>

                    <select name="section_type[]" class="form-control sectionType">
                        <option value="">Select Section Type</option>
                        <option value="hero">Hero Section</option>
                        <option value="custom">Custom Section</option>
                    </select>
                </div>

                <!-- Hero Section -->
                <div class="col-sm-5 mb-3 heroSection d-none">
                    <label>Hero Sections</label>

                    <select name="hero_section[]" class="form-control">
                        <option value="">Select Hero Section</option>
                        <option value="hero1">Hero 1</option>
                        <option value="hero2">Hero 2</option>
                    </select>
                </div>

                <!-- Custom Section -->
                <div class="col-sm-5 mb-3 customSection d-none">
                    <label>Custom Sections</label>

                    <select name="custom_section[]" class="form-control">
                        <option value="">Select Custom Section</option>
                        <option value="custom1">Custom 1</option>
                        <option value="custom2">Custom 2</option>
                    </select>
                </div>

            </div>
        </div>
        `;

        $('#sectionWrapper').append(html);
    });

    // Remove Section
    $(document).on('click', '.removeSection', function () {

        // prevent deleting last section
        if ($('.section-item').length > 1) {
            $(this).closest('.section-item').remove();
        } else {
            alert('At least one section is required.');
        }
    });

    // Show Hide Sections
    $(document).on('change', '.sectionType', function () {

        let value = $(this).val();

        let parent = $(this).closest('.section-item');

        // Hide all first
        parent.find('.heroSection').addClass('d-none');
        parent.find('.customSection').addClass('d-none');

        // Reset values
        parent.find('.heroSection select').val('');
        parent.find('.customSection select').val('');

        // Show according to type
        if (value === 'hero') {
            parent.find('.heroSection').removeClass('d-none');
        }

        if (value === 'custom') {
            parent.find('.customSection').removeClass('d-none');
        }
    });

});
</script>