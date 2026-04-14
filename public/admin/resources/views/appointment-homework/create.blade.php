@extends('layouts.app')

@section('title', isset($details) ? 'Edit Homework' : 'Add Homework')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($details) ? 'Edit' : 'Add' }} Homework
        </h1>

        <a href="{{ route('appointment-homework.index') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('appointment-homework.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="row">

                    {{-- Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $details->title ?? '') }}" required>
                    </div>

                    {{-- Page Name --}}
                    <div class="col-sm-6 mb-3">
                        <label>Page Name *</label>
                        <input type="text" name="page_name" class="form-control"
                            value="{{ old('page_name', $details->page_name ?? '') }}" required>
                    </div>

                    {{-- Sub Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Sub Title</label>
                        <input type="text" name="sub_title" class="form-control"
                            value="{{ old('sub_title', $details->sub_title ?? '') }}">
                    </div>

                    {{-- Media Type --}}
                    <div class="col-sm-6 mb-3">
                        <label>Media Type</label>
                        <select name="media_type" id="media_type" class="form-control">
                            <option value="image" {{ old('media_type', $details->media_type ?? '') == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ old('media_type', $details->media_type ?? '') == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="embed_code" {{ old('media_type', $details->media_type ?? '') == 'embed_code' ? 'selected' : '' }}>Embed Code</option>
                        </select>
                    </div>

                    {{-- Media Upload --}}
                    <div class="col-sm-6 mb-3 mediaBox">
                        <label>Upload File</label>
                        <input type="file" name="media_path" class="form-control" accept="image/*,video/*">

                        @if(!empty($details->media_path))
                            <input type="hidden" name="old_media" value="{{ $details->media_path }}">
                            <a href="{{ $details->media_path }}" target="_blank">View File</a>
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 embedBox">
    <label>Embed URL</label>
    <input type="text" name="embed_url" class="form-control"
        placeholder="Enter YouTube / Vimeo URL"
        value="{{ old('embed_url', (isset($details) && $details->media_type == 'embed_code') ? $details->media_path : '') }}">
</div>

                    {{-- Media Visible (Switch) --}}
                    <div class="col-sm-6 mb-3 swich_bntts">
                         <label>Media Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="media_visible" value="1"
                            {{ (old('media_visible', $details->media_visible ?? 1) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Embed Code --}}
                    <div class="col-sm-12 mb-3 embedBox">
                        <label>Embed Code</label>
                        <textarea name="embed_code" class="form-control">{{ old('embed_code', $details->embed_code ?? '') }}</textarea>
                    </div>

                    {{-- Embed Visible --}}
                    <div class="col-sm-6 mb-3 swich_bntts">
                         <label>Embed Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="ec_visible" value="1"
                            {{ (old('ec_visible', $details->ec_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- File Drive ID --}}
                    <div class="col-sm-6 mb-3 fileBox">
    <label>Select File</label>
    <select name="file_drive_id" class="form-control">
        <option value="">Select File</option>
        @foreach($fileDrives as $id => $title)
            <option value="{{ $id }}"
                {{ old('file_drive_id', $details->file_drive_id ?? '') == $id ? 'selected' : '' }}>
                {{ $title }}
            </option>
        @endforeach
    </select>
</div>

                    {{-- File Visible --}}
                    <div class="col-sm-6 mb-3 swich_bntts">
                         <label>File Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="fd_visible" value="1"
                            {{ (old('fd_visible', $details->fd_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Form ID --}}
                    <div class="col-sm-6 mb-3">
    <label>Select Form</label>
    <select name="form_id" class="form-control">
        <option value="">Select Form</option>
        @foreach($forms as $id => $name)
            <option value="{{ $id }}"
                {{ old('form_id', $details->form_id ?? '') == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>
                    {{-- Form Visible --}}
                    <div class="col-sm-6 mb-3 swich_bntts">
                         <label>Form Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                              <input type="checkbox" name="form_visible" value="1"
                            {{ (old('form_visible', $details->form_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="col-sm-12 mb-3">
                        <label>Description</label>
                        <textarea name="sort_description" id="editor" class="form-control">{{ old('sort_description', $details->sort_description ?? '') }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
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
<script>
function toggleMediaFields() {

    let type = document.getElementById('media_type').value;

    let mediaBox = document.querySelector('.mediaBox');
    let embedBox = document.querySelector('.embedBox');

    if (type === 'embed_code') {
        mediaBox.style.display = 'none';
        embedBox.style.display = 'block';
    } else {
        mediaBox.style.display = 'block';
        embedBox.style.display = 'none';
    }
}

document.getElementById('media_type').addEventListener('change', toggleMediaFields);

window.onload = function () {
    toggleMediaFields();
};
</script>
@endsection
