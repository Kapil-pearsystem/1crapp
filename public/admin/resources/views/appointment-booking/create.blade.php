@extends('layouts.app')

@section('title', isset($details) ? 'Edit Appointment Booking' : 'Add Appointment Booking')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($details) ? 'Edit' : 'Add' }} Appointment Booking
        </h1>

        <a href="{{ route('appointment-booking.index') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('appointment-booking.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="row">

                    {{-- Page Name --}}
                    <div class="col-sm-6 mb-3">
                        <label>Page Name *</label>
                        <input type="text" name="page_name" class="form-control"
                            value="{{ old('page_name', $details->page_name ?? '') }}" required>
                    </div>

                    {{-- Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $details->title ?? '') }}" required>
                    </div>

                    {{-- Subtitle --}}
                    <div class="col-sm-6 mb-3">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" class="form-control"
                            value="{{ old('subtitle', $details->subtitle ?? '') }}">
                    </div>

                    {{-- Step Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Step Title</label>
                        <input type="text" name="step_title" class="form-control"
                            value="{{ old('step_title', $details->step_title ?? '') }}">
                    </div>

                    {{-- Left Section 1 --}}
                    <div class="col-sm-6 mb-3">
                        <label>Left Title 1</label>
                        <input type="text" name="left_title" class="form-control"
                            value="{{ old('left_title', $details->left_title ?? '') }}">
                    </div>

                    

                    {{-- Left Section 2 --}}
                    <div class="col-sm-6 mb-3">
                        <label>Left Title 2</label>
                        <input type="text" name="left_title2" class="form-control"
                            value="{{ old('left_title2', $details->left_title2 ?? '') }}">
                    </div>
                    {{-- Left Section 3 --}}
                    <div class="col-sm-6 mb-3">
                        <label>Left Title 3</label>
                        <input type="text" name="left_title3" class="form-control"
                            value="{{ old('left_title3', $details->left_title3 ?? '') }}">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label>Left Description 1</label>
                        <textarea name="left_description1" id="description_editor1" class="form-control">
                            {{ old('left_description1', $details->left_description1 ?? '') }}
                        </textarea>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label>Left Description 2</label>
                        <textarea name="left_description2" id="description_editor2" class="form-control">
                            {{ old('left_description2', $details->left_description2 ?? '') }}
                        </textarea>
                    </div>

                    

                    <div class="col-sm-12 mb-3">
                        <label>Left Description 3</label>
                        <textarea name="left_description3" id="description_editor3" class="form-control">
                            {{ old('left_description3', $details->left_description3 ?? '') }}
                        </textarea>
                    </div>

                    {{-- Embed Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Embed Title</label>
                        <input type="text" name="embed_title" class="form-control"
                            value="{{ old('embed_title', $details->embed_title ?? '') }}">
                    </div>

                    {{-- Embed Code --}}
                    <div class="col-sm-6 mb-3">
                        <label>Embed Code</label>
                        <textarea name="embed_code"
                            class="form-control">{{ old('embed_code', $details->embed_code ?? '') }}</textarea>
                    </div>

                    {{-- Testimonial Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Testimonial Title</label>
                        <input type="text" name="testimonial_title" class="form-control"
                            value="{{ old('testimonial_title', $details->testimonial_title ?? '') }}">
                    </div>

                    {{-- Testimonial Visible --}}
                    
                     <div class="col-sm-3 mb-3 swich_bntts">
                         <label>Testimonial Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                              <input type="checkbox" name="test_visible" value="1"
                            {{ (old('test_visible', $details->test_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Testimonial Title Visible --}}
                    
                    <div class="col-sm-3 mb-3 swich_bntts">
                         <label>Test Title Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                              <input type="checkbox" name="test_title_visible" value="1"
                            {{ (old('test_title_visible', $details->test_title_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="col-sm-12 mb-3">
                        <label>Description</label>
                        <textarea name="sort_description"
                            class="form-control">{{ old('sort_description', $details->sort_description ?? '') }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active
                            </option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    {{ isset($details) ? 'Update' : 'Save' }}
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
@section('scripts')

<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script>
function initEditor(id) {
    if (document.getElementById(id)) {
        CKEDITOR.replace(id, {
            uiColor: '#DAF2FE',
            height: 200,
            toolbar: [
                ['Source'],
                ['Bold', 'Italic', 'Underline'],
                ['NumberedList', 'BulletedList'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                ['Link', 'Unlink'],
                ['Image', 'Table', 'HorizontalRule'],
                ['Format', 'Font', 'FontSize', 'TextColor']
            ],
            filebrowserBrowseUrl: '{{ url("ckfinder/ckfinder.html") }}',
            filebrowserImageBrowseUrl: '{{ url("ckfinder/ckfinder.html?Type=Images") }}',
            filebrowserUploadUrl: '{{ url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
            filebrowserImageUploadUrl: '{{ url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}'
        });
    }
}

// ✅ initialize all editors
document.addEventListener("DOMContentLoaded", function () {
    initEditor('description_editor1');
    initEditor('description_editor2');
    initEditor('description_editor3');
    initEditor('editor');
});
</script>

@endsection