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
        <form method="POST" action="{{ route('core-page.save')}}" enctype="multipart/form-data" onsubmit="return validate()"
            name="f1">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ isset($details)?$details->id:'' }}">
                <div class="form-group row">
                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> Page Name <span style="color: red;">*</span><input
                            type="text" id="" placeholder="Enter Page Name" name="page_name"
                            value="{{ old('page_name') ?? ($details->page_name ?? '') }}" required
                            class="form-control form-control-user" /> </div> @if ($errors->has('page_name')) <span
                        class="text-danger">{{ $errors->first('page_name') }}</span> @endif
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        Layout <span style="color: red;">*</span><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout" id="inlineRadio1" value="1" {{ (old('layout', $details->layout ?? 0) == 1) ? 'checked' : 'checked' }}>
                            <label class="form-check-label" for="inlineRadio1">Default</label>
                        </div>
                        <!-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout" id="inlineRadio2" value="2" {{ (old('layout', $details->layout ?? 0) == 2) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Custom</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout" id="inlineRadio3" value="0" {{ (old('layout', $details->layout ?? 0) == 0) ? 'checked' : '' }} {{ isset($details)?'':'checked' }}>
                            <label class="form-check-label" for="inlineRadio3">None</label>
                        </div> -->
                    </div>
                </div>
                <div class="form-group row px-2" id="sectionWrapper">
                    <div class="d-flex">
                        <h6>Sections</h6>
                        <button type="button" id="addMoreSection" class="btn btn-sm btn-primary" style="position:absolute; right:10px;"><i class="fa fa-plus"></i> Section </button>
                    </div>
                    @if(isset($details) && $details->sections->isNotEmpty())
                    @foreach($details->sections as $sect)
                    <div class="col-12 section-item border p-3 mb-3 rounded position-relative mt-1">
                        <button type="button"
                            class="btn btn-danger btn-sm removeSection"
                            style="position:absolute; right:10px; top:10px;">
                            <i class="fa fa-times"></i>
                        </button>
                        <div class="row">
                            <!-- Section Type -->
                            <div class="col-sm-6 mb-3">
                                <label>Section Type</label>
                                <select name="section_type[]" class="form-control sectionType">
                                    <option value="">Select Section Type</option>
                                    <option value="1"
                                        {{ $sect->type == 1 ? 'selected' : '' }}>
                                        Hero Section
                                    </option>
                                    <option value="2"
                                        {{ $sect->type == 2 ? 'selected' : '' }}>
                                        Custom Section
                                    </option>
                                </select>
                            </div>
                            <!-- Hero Section -->
                            <div class="col-sm-6 mb-3 heroSection {{ $sect->type == 1 ? '' : 'd-none' }}">
                                <label>Hero Sections</label>
                                <select name="hero_section[]" class="form-control">
                                    <option value="">Select Hero Section</option>
                                    @foreach($herosections as $hero)
                                    <option value="{{ $hero->id }}" {{ $sect->section_id == $hero->id ? 'selected' : '' }}> {{ $hero->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Custom Section -->
                            <div class="col-sm-6 mb-3 customSection {{ $sect->type == 2 ? '' : 'd-none' }}">
                                <label>Custom Sections</label>
                                <select name="custom_section[]" class="form-control">
                                    <option value="">Select Custom Section</option>
                                    @foreach($extsections as $ext)
                                    <option value="{{ $ext->id }}" {{ $sect->section_id == $ext->id ? 'selected' : '' }}> {{ $ext->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 section-item border p-3 mb-3 rounded position-relative mt-1">
                        <button type="button"
                            class="btn btn-danger btn-sm removeSection"
                            style="position:absolute; right:10px; top:10px;">
                            <i class="fa fa-times"></i>
                        </button>
                        <div class="row">
                            <!-- Section Type -->
                            <div class="col-sm-6 mb-3">
                                <label>Section Type</label>
                                <select name="section_type[]" class="form-control sectionType">
                                    <option value="">Select Section Type</option>
                                    <option value="1">Hero Section</option>
                                    <option value="2">Custom Section</option>
                                </select>
                            </div>
                            <!-- Hero Section -->
                            <div class="col-sm-6 mb-3 heroSection d-none">
                                <label>Hero Sections</label>
                                <select name="hero_section[]" class="form-control">
                                    <option value="">Select Hero Section</option>
                                    @foreach($herosections as $hero)
                                    <option value="{{ $hero->id }}"> {{ $hero->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Custom Section -->
                            <div class="col-sm-6 mb-3 customSection d-none">
                                <label>Custom Sections</label>
                                <select name="custom_section[]" class="form-control">
                                    <option value="">Select Custom Section</option>
                                    @foreach($extsections as $ext)
                                    <option value="{{ $ext->id }}"> {{ $ext->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif
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
    function validate() {
        let pageName = $('input[name="page_name"]').val().trim();
        let layout = $('input[name="layout"]:checked').val();
        let status = $('select[name="status"]').val();
        if (pageName == '') {
            alert('Page Name is required');
            return false;
        }
        if (layout == undefined) {
            alert('Please select layout');
            return false;
        }
        let isValid = true;
        $('.section-item').each(function(index) {
            let sectionType = $(this).find('.sectionType').val();
            let heroSection = $(this).find('select[name="hero_section[]"]').val();
            let customSection = $(this).find('select[name="custom_section[]"]').val();
            if (sectionType == '') {
                alert('Please select section type in section #' + (index + 1));
                isValid = false;
                return false;
            }
            if (sectionType == 'hero' && heroSection == '') {
                alert('Please select hero section in section #' + (index + 1));
                isValid = false;
                return false;
            }
            if (sectionType == 'custom' && customSection == '') {
                alert('Please select custom section in section #' + (index + 1));
                isValid = false;
                return false;
            }
        });
        if (!isValid) {
            return false;
        }
        if (status == null || status == '') {
            alert('Please select status');
            return false;
        }
        return true;
    }
</script>
<script>
    $(document).ready(function() {
        // Add More Section
        $('#addMoreSection').on('click', function() {
            let html = `
        <div class="col-12 section-item border p-3 mb-3 rounded position-relative">
            <button type="button"
                class="btn btn-danger btn-sm removeSection"
                style="position:absolute; right:10px; top:10px;">
                <i class="fa fa-times"></i>
            </button>
            <div class="row">
                <!-- Section Type -->
                <div class="col-sm-6 mb-3">
                    <label>Section Type</label>
                    <select name="section_type[]" class="form-control sectionType">
                        <option value="">Select Section Type</option>
                        <option value="1">Hero Section</option>
                        <option value="2">Custom Section</option>
                    </select>
                </div>
                <!-- Hero Section -->
                <div class="col-sm-6 mb-3 heroSection d-none">
                    <label>Hero Sections</label>
                    <select name="hero_section[]" class="form-control">
                        <option value="">Select Hero Section</option>
                        @foreach($herosections as $hero)
                            <option value="{{ $hero->id }}">
                                {{ $hero->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Custom Section -->
                <div class="col-sm-6 mb-3 customSection d-none">
                    <label>Custom Sections</label>
                    <select name="custom_section[]" class="form-control">
                        <option value="">Select Custom Section</option>
                        @foreach($extsections as $ext)
                            <option value="{{ $ext->id }}">
                                {{ $ext->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        `;
            $('#sectionWrapper').append(html);
        });
        // Remove Section
        $(document).on('click', '.removeSection', function() {
            if ($('.section-item').length > 1) {
                $(this).closest('.section-item').remove();
            } else {
                alert('At least one section is required.');
            }
        });
        // Show / Hide Sections
        $(document).on('change', '.sectionType', function() {
            let value = $(this).val();
            // alert(value);
            let parent = $(this).closest('.section-item');
            // Hide all
            parent.find('.heroSection').addClass('d-none');
            parent.find('.customSection').addClass('d-none');
            // Reset select values
            parent.find('.heroSection select').val('');
            parent.find('.customSection select').val('');
            // Show according to selected type
            if (value == 1) {
                parent.find('.heroSection').removeClass('d-none');
            }
            if (value == 2) {
                parent.find('.customSection').removeClass('d-none');
            }
        });
    });
</script>